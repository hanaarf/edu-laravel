<div class="deznav">
    <div class="deznav-scroll">
        <div class="main-profile">
            <div class="image-bx">
                @if(Auth::user()->image)
                <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="User Image">
                @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="User Avatar">
                @endif
            </div>
            <h5 class="name"><span class="font-w400">Hello,</span> {{ Auth::user()->name }}</h5>
            <p class="email"><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                    data-cfemail="95f8f4e7e4e0f0efefefefd5f8f4fcf9bbf6faf8">{{ Auth::user()->email }}</a></p>
        </div>
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a href="{{ route('t.dashboard')}}" aria-expanded="false">
                    <i class="flaticon-144-layout"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-label">Apps</li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-061-puzzle"></i>
                    <span class="nav-text">Materi PDF</span>
                </a>
                <ul aria-expanded="false">
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">SD</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('materi_pdf.filter', 1) }}">Kelas 1</a></li>
                            <li><a href="{{ route('materi_pdf.filter', 2) }}">Kelas 2</a></li>
                            <li><a href="{{ route('materi_pdf.filter', 3) }}">Kelas 3</a></li>
                            <li><a href="{{ route('materi_pdf.filter', 4) }}">Kelas 4</a></li>
                            <li><a href="{{ route('materi_pdf.filter', 5) }}">Kelas 5</a></li>
                            <li><a href="{{ route('materi_pdf.filter', 6) }}">Kelas 6</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">SMP</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('materi_pdf.filter', 7) }}">Kelas 7</a></li>
                            <li><a href="{{ route('materi_pdf.filter', 8) }}">Kelas 8</a></li>
                            <li><a href="{{ route('materi_pdf.filter', 9) }}">Kelas 9</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">SMA</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('materi_pdf.filter', 10) }}">Kelas 10</a></li>
                            <li><a href="{{ route('materi_pdf.filter', 11) }}">Kelas 11</a></li>
                            <li><a href="{{ route('materi_pdf.filter', 12) }}">Kelas 12</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-internet"></i>
                    <span class="nav-text">Materi Video</span>
                </a>
                <ul aria-expanded="false">
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">SD</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('materi_video.filter', 1) }}">Kelas 1</a></li>
                            <li><a href="{{ route('materi_video.filter', 2) }}">Kelas 2</a></li>
                            <li><a href="{{ route('materi_video.filter', 3) }}">Kelas 3</a></li>
                            <li><a href="{{ route('materi_video.filter', 4) }}">Kelas 4</a></li>
                            <li><a href="{{ route('materi_video.filter', 5) }}">Kelas 5</a></li>
                            <li><a href="{{ route('materi_video.filter', 6) }}">Kelas 6</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">SMP</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('materi_video.filter', 7) }}">Kelas 7</a></li>
                            <li><a href="{{ route('materi_video.filter', 8) }}">Kelas 8</a></li>
                            <li><a href="{{ route('materi_video.filter', 9) }}">Kelas 9</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">SMA</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('materi_video.filter', 10) }}">Kelas 10</a></li>
                            <li><a href="{{ route('materi_video.filter', 11) }}">Kelas 11</a></li>
                            <li><a href="{{ route('materi_video.filter', 12) }}">Kelas 12</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
