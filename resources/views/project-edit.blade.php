@extends('layout')

@section('title', 'Главная')

@section('page-content')

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Редактирование проекта</h2>
            </div>

            <div class="container text-center">
                <div class="row justify-content-center ">
                    <form class="needs-validation" novalidate=""
                          action="{{route('project-edit')}}"
                          method="post"
                          autocomplete="off"
                          enctype="multipart/form-data">
                        @csrf
                        <input hidden value="{{$project->id}}" name="project_id">
                        <div class="row g-3 col-4 offset-4">
                            <div class="col-12">
                                <label for="name" class="form-label">Название проекта</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Название" required="" value="{{$project->name}}">
                                @error('name')
                                <span class="form__error">Введите Название</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="description" class="form-label">Описание</label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="Описание" value="{{$project->description}}">
                                @error('description')
                                <span class="form__error">Введите описание</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="category_id" class="form-label">Категория</label>
                                <input type="text" class="form-control" id="category_id" name="category_id" placeholder="Категория" value="{{$project->category_id}}">
                                @error('category_id')
                                <span class="form__error">Выберите категорию</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="img_url" class="form-label">Изображение</label>
                                <input type="file" class="form-control" id="img_url" name="img_url" value="{{$project->img_url}}">
                                @error('img_url')
                                <span class="form__error">Выберите изображение</span>
                                @enderror
                            </div>
                            <hr class="my-4">
                            <button class="w-100 btn btn-primary btn-lg " type="submit">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

@endsection
