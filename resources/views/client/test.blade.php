@extends('layouts.client')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Test</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="javascript:;">
                        @csrf
                        
                            <div class="card mb-3">
                                <div class="card-header">$category->name</div>
                
                                <div class="card-body">
                                        <div class="card ">
                                            <div class="card-header">$question->question_text </div>
                        
                                            <div class="card-body">
                                                <input type="hidden" name="questions" value="">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="questions" id="option-" value="">
                                                        <label class="form-check-label" for="option-">
                                                            $option->option_text
                                                        </label>
                                                    </div>

                                                    <span style="margin-top: .25rem; font-size: 80%; color: #e3342f;" role="alert">
                                                        <strong>$errors->first("questions.$question->id"</strong>
                                                    </span>
                                            </div>
                                        </div>
                                </div>
                            </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection