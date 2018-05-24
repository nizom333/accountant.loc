@extends('layouts.app')

@section('content')

@component('component.breadcrumbs')
    @slot('title') Главная @endslot
    @slot('main')  @endslot
    @slot('active')  @endslot
@endcomponent



<div class="container-fluid">

    <div class="card-group">

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-wallet text-purple"></i></h2>
                        <h3 class="">$24561</h3>
                        <h6 class="card-subtitle">Доходы</h6></div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 56%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-buffer text-warning"></i></h2>
                        <h3 class="">$30010</h3>
                        <h6 class="card-subtitle">Затраты</h6>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 26%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="card">
        <div class="card-body bg-inverse" style="background: url(../assets/images/background/user-info.jpg) / cover;">
            <h4 class="text-white card-title">Employee list</h4>
            <h6 class="card-subtitle text-white m-0 op-5">Checkout employee list here</h6>
        </div>
        <div class="card-body">
            <div class="message-box contact-box">
                <h2 class="add-ct-btn"><button type="button" class="btn btn-circle btn-lg btn-success waves-effect waves-dark">+</button></h2>
                <div class="message-widget contact-widget">
                    <!-- Message -->
                    <a href="#">
                        <div class="user-img"> <img src="../assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                        <div class="mail-contnet">
                            <h5>Pavan kumar</h5> <span class="mail-desc">info@wrappixel.com</span></div>
                    </a>
                    <!-- Message -->
                    <a href="#">
                        <div class="user-img"> <img src="../assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                        <div class="mail-contnet">
                            <h5>Sonu Nigam</h5> <span class="mail-desc">pamela1987@gmail.com</span></div>
                    </a>
                    <!-- Message -->
                    <a href="#">
                        <div class="user-img"> <span class="round">A</span> <span class="profile-status away pull-right"></span> </div>
                        <div class="mail-contnet">
                            <h5>Arijit Sinh</h5> <span class="mail-desc">cruise1298.fiplip@gmail.com</span></div>
                    </a>
                    <!-- Message -->
                    <a href="#">
                        <div class="user-img"> <img src="../assets/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                        <div class="mail-contnet">
                            <h5>Pavan kumar</h5> <span class="mail-desc">kat@gmail.com</span></div>
                    </a>
                </div>
            </div>
        </div>
    </div>




            <div class="card">

                <div class="table-responsive">
                    <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Opened By</th>
                                <th>Sbuject</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="javascript:void(0)"> Genelia Deshmukh</a>
                                </td>
                                <td>genelia@gmail.com</td>
                                <td>Johnathon</td>
                                <td>14-10-2017</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
</div>

@endsection
