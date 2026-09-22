@extends('layouts.app')

@section('title', $profile['name'] . ' — Software Developer')

@section('content')

<header class="nav" id="siteNav">
  <div class="nav-inner">
    <a class="nav-brand" href="#home">
      <span class="nav-mark-badge mono">AI</span>
      <span class="name">{{ $profile['name'] }}</span>
    </a>
    <ul class="nav-links">
      <li><a href="#tentang">Tentang</a></li>
      <li><a href="#spesialisasi">Spesialisasi</a></li>
      <li><a href="#proyek">Proyek</a></li>
      <li><a href="#keahlian">Keahlian</a></li>
      <li><a href="#kontak">Kontak</a></li>
    </ul>
  </div>
</header>

<main>

  <section class="hero" id="home">
    <div class="wrap hero-grid">
      <div>
        <span class="eyebrow-role mono">{{ $profile['title'] }}</span>
        <h1>{{ $profile['name'] }}</h1>
        <p class="hero-lede">Fresh graduate Teknik Informatika yang membangun sistem dari fondasi ke permukaan — dari skema enkripsi dan tanda tangan digital, sampai antarmuka yang dipakai penggunanya sehari-hari.</p>
        <div class="hero-cta">
          <a class="btn btn-primary" href="mailto:{{ $profile['email'] }}">Hubungi Saya</a>
          <a class="btn btn-ghost" href="{{ $profile['github'] }}" target="_blank" rel="noopener">Lihat GitHub</a>
        </div>
      </div>
      <div class="hero-visual" aria-hidden="true">
        <svg viewBox="0 0 210 210" xmlns="http://www.w3.org/2000/svg">
          <g id="grid"></g>
        </svg>
      </div>
    </div>

    <div class="wrap">
      <div class="facts">
        @foreach ($facts as $fact)
        <div class="fact">
          <div class="fact-label mono">{{ $fact['label'] }}</div>
          <div class="fact-value">{{ $fact['value'] }}</div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="about" id="tentang">
    <div class="wrap about-grid">
      <div>
        <div class="section-head"><span class="accent-bar"></span><h2>{{ $about['heading'] }}</h2></div>
        @foreach ($about['paragraphs'] as $paragraph)
        <p>{{ $paragraph }}</p>
        @endforeach
      </div>
      <div class="about-links">
        <a href="mailto:{{ $profile['email'] }}">{{ $profile['email'] }}</a>
        <a href="{{ $profile['github'] }}" target="_blank" rel="noopener">{{ $profile['githubLabel'] }}</a>
        <a href="{{ $profile['oldPortfolio'] }}" target="_blank" rel="noopener">Portofolio versi awal</a>
      </div>
    </div>
  </section>

  <section class="specialisasi" id="spesialisasi">
    <div class="wrap">
      <div class="section-head"><span class="accent-bar"></span><h2>Empat lapisan keamanan yang saya kuasai</h2></div>
      <div class="spec-grid">
        @foreach ($specializations as $spec)
        <div class="spec-card">
          <span class="spec-tag mono">{{ $spec['tag'] }}</span>
          <h3>{{ $spec['title'] }}</h3>
          <p>{{ $spec['body'] }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="projects" id="proyek">
    <div class="wrap">
      <div class="section-head"><span class="accent-bar"></span><h2>Yang sudah saya bangun</h2></div>

      <div class="project-case">
        <div class="project-head">
          <div>
            <h3>{{ $featuredProject['name'] }}</h3>
            <p class="project-role">{{ $featuredProject['role'] }}</p>
          </div>
          <span class="project-badge mono">{{ $featuredProject['badge'] }}</span>
        </div>

        <div class="project-body">
          <div class="project-col">
            <h4>Masalah</h4>
            <p>{{ $featuredProject['problem'] }}</p>
            <h4 style="margin-top:22px;">Solusi</h4>
            <p>{{ $featuredProject['solution'] }}</p>
          </div>
          <div class="project-col">
            <h4>Arsitektur teknis</h4>
            <ul>
              @foreach ($featuredProject['architecture'] as $point)
              <li>{{ $point }}</li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="spec-chips">
          @foreach ($featuredProject['stack'] as $tech)
          <span class="chip">{{ $tech }}</span>
          @endforeach
        </div>

        @if (!empty($featuredProject['video']))
        <a class="btn btn-video" href="{{ $featuredProject['video'] }}" target="_blank" rel="noopener">▶ Tonton Penjelasan Proyek</a>
        @endif

        <div class="project-result">
          {{ $featuredProject['result'] }}
        </div>
      </div>

      <div class="project-secondary">
        <div>
          <h3>{{ $secondaryProject['name'] }}</h3>
          <p class="project-role">{{ $secondaryProject['role'] }}</p>
          <p>{{ $secondaryProject['body'] }}</p>
        </div>
        <div>
          <div class="spec-chips">
            @foreach ($secondaryProject['stack'] as $tech)
            <span class="chip">{{ $tech }}</span>
            @endforeach
          </div>
          <p style="margin-top:18px;">{{ $secondaryProject['note'] }}</p>
          @if (!empty($secondaryProject['video']))
          <a class="btn btn-video" href="{{ $secondaryProject['video'] }}" target="_blank" rel="noopener">▶ Tonton Penjelasan Proyek</a>
          @endif
        </div>
      </div>
    </div>
  </section>

  <section class="skills" id="keahlian">
    <div class="wrap">
      <div class="section-head"><span class="accent-bar"></span><h2>Perangkat yang saya pakai</h2></div>
      <div class="skills-grid">
        @foreach ($skillGroups as $group)
        <div class="skill-group">
          <h4>{{ strtoupper($group['title']) }}</h4>
          <ul>
            @foreach ($group['items'] as $item)
            <li>{{ $item }}</li>
            @endforeach
          </ul>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="org" id="organisasi">
    <div class="wrap">
      <div class="section-head"><span class="accent-bar"></span><h2>Di luar layar</h2></div>
      <div class="org-card">
        <span class="org-mark mono">{{ $orgExperience['mark'] }}</span>
        <div>
          <h3>{{ $orgExperience['title'] }}</h3>
          <p>{{ $orgExperience['body'] }}</p>
          <ul>
            @foreach ($orgExperience['timeline'] as $item)
            <li><strong>{{ $item['date'] }}</strong> — {{ $item['desc'] }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="contact" id="kontak">
    <div class="wrap">
      <div class="contact-panel">
        <h2>Terbuka untuk peluang sebagai developer.</h2>
        <div class="contact-links">
          <a href="mailto:{{ $profile['email'] }}">{{ $profile['email'] }}</a>
          <a href="{{ $profile['github'] }}" target="_blank" rel="noopener">{{ $profile['githubLabel'] }}</a>
          <span class="mono">{{ strtoupper($profile['location']) }}</span>
        </div>
      </div>
    </div>
  </section>

</main>

<footer>
  © {{ date('Y') }} {{ $profile['name'] }}.
</footer>

@endsection
