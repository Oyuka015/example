@extends('ulayout.ulayout')
 
@section('content')
<style>
    .lil-content::before{
        background-image: url('https://img.freepik.com/premium-photo/white-questions-mark-illustration-yellow-background-copy-space-faq-question-answer-time-by-3d-rendering_50039-2919.jpg?size=626&ext=jpg&ga=GA1.2.821502220.1669877714&semt=sph');
    }
</style>

<div class="lil-header-section">
    <div class="lil-content">
        <h1>Асуулт хариулт</h1>
    </div>
</div>
<div class="q-container">
    <div class="q-title">
        <h1><span>Түгээмэл асуулт</span> хариултууд</h1>
        <div class="q-line"></div>
    </div>
    <div class="q-list">
        @foreach($faqs as $faq)
            <div class="list ">
                <div class="faq-q">
                    <i class="fa-regular fa-circle-dot"></i>
                    <p>{{$faq->question}}</p>
                </div>
                <div class="faq-a">
                    <p>{{$faq->answer}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script>
    let q = document.querySelectorAll(".faq-q");
    for(i=0; i < q.length; i++){
        q[i].addEventListener('click', (e)=>{
            let qParent = e.target.parentElement.parentElement;
            qParent.classList.toggle("showMenu");
        });
    }
</script>

@endsection
 
@push('js')

@endpush