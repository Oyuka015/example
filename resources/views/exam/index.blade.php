@extends('ulayout.ulayout')
 
@section('content')
<style>
    .lil-content::before{
        background-image: url('https://img.freepik.com/premium-photo/woman-s-hands-filling-standardized-test-form_9635-1603.jpg?size=626&ext=jpg&ga=GA1.2.821502220.1669877714&semt=sph')
    }
</style>
<div class="lil-header-section">
    <div class="lil-content">
        <h1>Шалгалтууд</h1>
    </div>
</div>
<!-- exam cards -->
<div class="exam-card">
    <div class="cards">
        @foreach(@$exam as $exm)
            @if(in_array($exm->id, Auth::user()->exams()->wherePivot('is_passed', true)->pluck('exam_id')->toArray()))
            <a href="#" class="e-card" style="background-color: #a0e3bc">
                    <div class="e-title">{{$exm->name}}</div>
                    <div class="e-descri">{{$exm->description}}</div>
                    <div class="e-eye">
                        <div class="">
                            <p>Авсан оноо: {{Auth::user()->exams()->wherePivot('exam_id', $exm->id)->first()->pivot->score}}/{{Auth::user()->exams()->wherePivot('exam_id', $exm->id)->first()->questions->sum('score')}}</p>
                            <p>Огноо: {{Auth::user()->exams()->wherePivot('exam_id', $exm->id)->first()->pivot->exam_date}}</p>
                        </div>
                    </div>
                </a>
            @else
                <a href="#" onclick="checkExam({{$exm->id}}, '{{($exm->required_exam_id && in_array($exm->required_exam_id, Auth::user()->exams()->wherePivot('is_passed', true)->pluck('exam_id')->toArray())) || !$exm->required_exam_id}}', '{{@$exm->requiredExam ? @$exm->requiredExam->name : ''}}')" class="e-card">
                    <div class="e-title">{{$exm->name}}</div>
                    <div class="e-descri">{{$exm->description}}</div>
                    <div class="e-eye">
                        <div class="eye">
                        </div>
                        <div class="time">
                            <p>{{$exm->exam_time}}</p>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
    </div>
</div>
<script src="/js/sweetalert2.js"></script>
<script>
    function checkExam(examId, requiredExamId, reqExamName){
        console.log(examId, requiredExamId);
        if(requiredExamId)
        {
            location.replace('/exam/detail/'+examId);
        }
        else
        {
            Swal.fire({
                title: '"'+reqExamName+'" шалгалтыг гүйцэтгэнэ үү.',
                icon: 'warning',
                iconHtml: '!',
                confirmButtonText: 'Үргэлжлүүлэх',
                // showDenyButton: true,
                // showCloseButton: true
            }).then((result) => {
                
            });
        }
    }
</script>
@endsection
 
@push('js')

@endpush