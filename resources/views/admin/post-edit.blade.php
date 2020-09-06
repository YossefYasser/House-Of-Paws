@extends('layouts.master')

@section('title')
Edit Post
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Editing post</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="/post-edit-update/{{$post->id}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="postName" value="{{$post->name}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Content</label>
                                    <input type="text" name="postContent" value="{{$post->content}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="text" name="postImage" value="{{$post->image}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Species</label>
                                    <select name="postSpecies">

                                        <option value="bird" @if($post->species=='bird')selected="selected"@endif>bird</option>
                                        <option value="cat" @if($post->species=='cat')selected="selected"@endif>cat</option>
                                        <option value="dog" @if($post->species=='dog')selected="selected"@endif >dog</option>
                                        <option value="horse" @if($post->species=='horse')selected="selected"@endif>horse</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="postGender">

                                        <option value="male" @if($post->gender=='male')selected="selected"@endif>Male</option>
                                        <option value="female" @if($post->gender=='female')selected="selected"@endif>Female</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/dashboard" class="btn btn-danger">Cancel</a>
                            </form>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('script')
@endsection
