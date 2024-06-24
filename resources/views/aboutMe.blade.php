@extends('layout.app')

@section('title', 'About Me')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-3">
                <img src="{{asset('images/lorem.jpeg') }}" alt="User Profile Image" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Akmal Syaiful B</h5>
                    <p class="card-text">Web Developer</p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Contact Info</h5>
                    <p class="card-text">Email: <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">akkmalsyaiful@gmail.com</a></p>
                    <p class="card-text">Instagram: <a href="https://www.instagram.com/hikaks_4/">@hikaks_4</a></p>
                    <p class="card-text">Phone: +62 (0855) 555-5555</p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Skills</h5>
                    <p class="card-text">HTML</p>
                    <div class="progress mb-3">
                        <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
                    </div>
                    <p class="card-text">CSS</p>
                    <div class="progress mb-3">
                        <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                    </div>
                    <p class="card-text">JavaScript</p>
                    <div class="progress mb-3">
                        <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">About Me</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Education</h5>
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Computer and Network Engineering </h6>
                                <p class="mb-0">Yadika 4 High School, Tangerang Selatan</p>
                            </div>
                            <div class="flex-shrink-0"><span class="text-muted">2012-2016</span></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Master's Degree in Information Technology</h6>
                                <p class="mb-0">Budi Luhur University, Jakarta</p>
                            </div>
                            <div class="flex-shrink-0"><span class="text-muted">2016-2018</span></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
