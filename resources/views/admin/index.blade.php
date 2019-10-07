@extends('admin.layouts.master')
@section('title', 'Admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-profile">
                    <div class="card-header card-header-info card-header-text">
                        <div class="card-text">
                            <i class="material-icons">TV</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 id="welcome"></h3>
                        <h4>Cảm ơn đã sử dụng dịch vụ của chúng tôi</h4>
                        <h4>Liên hệ nếu bạn cần hỗ trợ</h4>
                        <a href="#" class="btn btn-info btn-round" target="_blank">Support</a>
                        <a href="#" class="btn btn-info btn-round" target="_blank">Donate</a>
                        <button class="btn btn-info btn-round" id="share"><i class="fa fa-facebook-square"></i> SHARE</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="" target="_blank">
                            <img class="img" src="{{ asset('public/images/user.png') }}" alt="Team FIT" />
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">Web Developer</h6>
                        <h4 class="card-title">Team FIT</h4>
                        <p class="card-description">
                            Chúng tôi là Web Developer/ Software Engineer. Hãy liên hệ khi bạn cần một dịch vụ chất lượng và chuyên nghiệp
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
