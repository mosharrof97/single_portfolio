@extends('user.backend.partial.layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="">
            @include('components.message')
        </div>
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">About Page</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.page_title_desc') }}" method="post">
                            @csrf
                            <input type="hidden" name="type" value="about_title_desc">
                            <div class="form-group">
                                <label for="bg_title">Big Title</label>
                                <input type="text" class="form-control" name="bg_title" id="bg_title" value="{{ userSetting('about_title_desc') !== null ? userSetting('about_title_desc')->bg_title : ''}}">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ userSetting('about_title_desc') !== null ? userSetting('about_title_desc')->title : ''}}">
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea class="form-control" name="desc" id="desc" cols="" rows="3">{{ userSetting('about_title_desc') !== null ? userSetting('about_title_desc')->desc : ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Service Page</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.page_title_desc') }}" method="post">
                            @csrf
                            <input type="hidden" name="type" value="service_title_desc">
                            <div class="form-group">
                                <label for="bg_title">Big Title</label>
                                <input type="text" class="form-control" name="bg_title" id="bg_title" value="{{ userSetting('service_title_desc') !== null ? userSetting('service_title_desc')->bg_title : ''}}">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ userSetting('service_title_desc') !== null ? userSetting('service_title_desc')->title : ''}}">
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea class="form-control" name="desc" id="desc" cols="" rows="3">{{ userSetting('service_title_desc') !== null ? userSetting('service_title_desc')->desc : ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Resume Page</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.page_title_desc') }}" method="post">
                            @csrf
                            <input type="hidden" name="type" value="resume_title_desc">
                            <div class="form-group">
                                <label for="bg_title">Big Title</label>
                                <input type="text" class="form-control" name="bg_title" id="bg_title" value="{{ userSetting('resume_title_desc') !== null ? userSetting('resume_title_desc')->bg_title : ''}}">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ userSetting('resume_title_desc') !== null ? userSetting('resume_title_desc')->title : ''}}">
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea class="form-control" name="desc" id="desc" cols="" rows="3">{{ userSetting('resume_title_desc') !== null ? userSetting('resume_title_desc')->desc : ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Skill Page</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.page_title_desc') }}" method="post">
                            @csrf
                            <input type="hidden" name="type" value="skill_title_desc">
                            <div class="form-group">
                                <label for="bg_title">Big Title</label>
                                <input type="text" class="form-control" name="bg_title" id="bg_title" value="{{ userSetting('skill_title_desc') !== null ? userSetting('skill_title_desc')->bg_title : ''}}">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ userSetting('skill_title_desc') !== null ? userSetting('skill_title_desc')->title : ''}}">
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea class="form-control" name="desc" id="desc" cols="" rows="3">{{ userSetting('skill_title_desc') !== null ? userSetting('skill_title_desc')->desc : ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Blog & News Page</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.page_title_desc') }}" method="post">
                            @csrf
                            <input type="hidden" name="type" value="blog_title_desc">
                            <div class="form-group">
                                <label for="bg_title">Big Title</label>
                                <input type="text" class="form-control" name="bg_title" id="bg_title" value="{{ userSetting('blog_title_desc') !== null ? userSetting('blog_title_desc')->bg_title : ''}}">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ userSetting('blog_title_desc') !== null ? userSetting('blog_title_desc')->title : ''}}">
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea class="form-control" name="desc" id="desc" cols="" rows="3">{{ userSetting('blog_title_desc') !== null ? userSetting('blog_title_desc')->desc : ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Project Page</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.page_title_desc') }}" method="post">
                            @csrf
                            <input type="hidden" name="type" value="project_title_desc">
                            <div class="form-group">
                                <label for="bg_title">Big Title</label>
                                <input type="text" class="form-control" name="bg_title" id="bg_title" value="{{ userSetting('project_title_desc') !== null ? userSetting('project_title_desc')->bg_title : ''}}">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ userSetting('project_title_desc') !== null ? userSetting('project_title_desc')->title : ''}}">
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea class="form-control" name="desc" id="desc" cols="" rows="3">{{ userSetting('project_title_desc') !== null ? userSetting('project_title_desc')->desc : ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Contact Page</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.page_title_desc') }}" method="post">
                            @csrf
                            <input type="hidden" name="type" value="contact_title_desc">
                            <div class="form-group">
                                <label for="bg_title">Big Title</label>
                                <input type="text" class="form-control" name="bg_title" id="bg_title" value="{{ userSetting('contact_title_desc') !== null ? userSetting('contact_title_desc')->bg_title : ''}}">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ userSetting('contact_title_desc') !== null ? userSetting('contact_title_desc')->title : ''}}">
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea class="form-control" name="desc" id="desc" cols="" rows="3">{{ userSetting('contact_title_desc') !== null ? userSetting('contact_title_desc')->desc : ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Hire Me</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.page_title_desc') }}" method="post">
                            @csrf
                            <input type="hidden" name="type" value="hireme_title_desc">
                            <div class="form-group">
                                <label for="bg_title">Big Title</label>
                                <input type="text" class="form-control" name="bg_title" id="bg_title" value="{{ userSetting('hireme_title_desc') !== null ? userSetting('hireme_title_desc')->bg_title : ''}}">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ userSetting('hireme_title_desc') !== null ? userSetting('hireme_title_desc')->title : ''}}">
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea class="form-control" name="desc" id="desc" cols="" rows="3">{{ userSetting('hireme_title_desc') !== null ? userSetting('hireme_title_desc')->desc : ''}}</textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
