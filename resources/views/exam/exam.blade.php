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
        <div class="lil-h-link">
            <a href="lil-test">Нүүр</a>
            <p>/</p>
            <a href="#">Шалгалтууд</a>
        </div>
    </div>
</div>
<!-- exam cards -->
<div class="exam-card">
    <div class="cards">
        <a href="exam/detail" class="e-card">
            <div class="e-title">Ленд менежер 2019/10</div>
            <div class="e-descri">Ленд менежер программ хангамжийн гэрчилгээ олгох 2019 оны 02 дүгээр шалгалт</div>
            <div class="e-eye">
                <div class="eye">
                    <i class="fa-solid fa-eye"></i>
                    <p>0</p>
                </div>
                <div class="time">
                    <p>60 мин</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
 
@push('js')

@endpush