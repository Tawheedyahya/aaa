@extends('layouts.app')

@section('page_title', $project['title'] . ' | AAA LED Projects')
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($project['description']), 160))
@section('meta_keywords', implode(', ', [$project['category'] . ' LED signage', $project['location'] . ' LED board', 'LED display installation', 'AAA LED project']))
@section('og_title', $project['title'] . ' | AAA LED')
@section('og_description', \Illuminate\Support\Str::limit(strip_tags($project['short_description']), 200))
@section('og_image', asset('assets/projects/' . $project['images'][0]))
@section('canonical', url('projects/' . $project['id']))
@section('robots', 'index, follow')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/projects.css') }}">
@endpush

@section('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": "BlogPosting",
            "@id": "{{ url('projects/' . $project['id']) }}#post",
            "url": "{{ url('projects/' . $project['id']) }}",
            "headline": "{{ $project['title'] }}",
            "description": "{{ \Illuminate\Support\Str::limit(strip_tags($project['short_description']), 200) }}",
            "image": {{ json_encode(array_map(function($img) {
                return asset('assets/projects/' . $img);
            }, $project['images'])) }},
            "datePublished": "{{ $project['date'] }}",
            "author": {
                "@type": "Organization",
                "name": "AAA LED"
            },
            "publisher": {
                "@type": "Organization",
                "name": "AAA LED",
                "logo": {
                    "@type": "ImageObject",
                    "url": "{{ asset('assets/static_images/logo.jpeg') }}"
                }
            },
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "{{ url('projects/' . $project['id']) }}"
            }
        },
        {
            "@type": "BreadcrumbList",
            "@id": "{{ url('projects/' . $project['id']) }}#breadcrumb",
            "itemListElement": [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "{{ url('/') }}"
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "Projects",
                    "item": "{{ url('projects') }}"
                },
                {
                    "@type": "ListItem",
                    "position": 3,
                    "name": "{{ $project['title'] }}",
                    "item": "{{ url('projects/' . $project['id']) }}"
                }
            ]
        }
    ]
}
</script>
@endSection

@section('content')

    {{-- PROJECT SINGLE --}}
    <article class="project-single" aria-labelledby="project-title">

        <div class="section-inner">

            <nav class="breadcrumb reveal" aria-label="Breadcrumb">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li><a href="/projects">Projects</a></li>
                    <li aria-current="page">{{ $project['title'] }}</li>
                </ol>
            </nav>

            <a href="/projects" class="project-single__back reveal">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                Back to Projects
            </a>

            <header class="project-single__header reveal">
                @if (!empty($project['category']))
                    <span class="project-single__category">{{ $project['category'] }}</span>
                @endif
                <h1 id="project-title" class="project-single__title">{{ $project['title'] }}</h1>
                <div class="project-single__meta">
                    @if (!empty($project['location']))
                        <span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 4px;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            {{ $project['location'] }}
                        </span>
                    @endif
                    @if (!empty($project['date']))
                        <span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 4px;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            {{ \Carbon\Carbon::parse($project['date'])->format('F j, Y') }}
                        </span>
                    @endif
                </div>
            </header>

            {{-- GALLERY --}}
            @if (!empty($project['images']))
                <div class="project-single__gallery {{ count($project['images']) === 1 ? 'project-single__gallery--single' : '' }} reveal">
                    @foreach ($project['images'] as $image)
                        <img
                            src="{{ asset('assets/projects/' . $image) }}"
                            alt="{{ $project['title'] }} - Image {{ $loop->iteration }}"
                            loading="{{ $loop->first ? 'eager' : 'lazy' }}"
                            width="800"
                            height="600">
                    @endforeach
                </div>
            @endif

            {{-- DESCRIPTION --}}
            <div class="project-single__description reveal">
                <h2>Project Details</h2>
                @php
                    $paragraphs = explode("\n\n", trim($project['description']));
                @endphp
                @foreach ($paragraphs as $para)
                    <p>{{ trim($para) }}</p>
                @endforeach
            </div>

            {{-- AD SLOT inside project page --}}
            <!-- @if (!empty($project['ad']))
                <div class="project-single__ad reveal">
                    <span class="project-single__ad-label">Advertisement</span>
                    <div class="project-single__ad-slot">
                        [ Ad Space — 728×90 or native ad ]
                    </div>
                </div>
            @endif -->

            {{-- CTA --}}
            <div class="project-single__cta reveal">
                <div class="hero__cta">
                    <a href="/contact" class="btn btn--primary">Start a Similar Project</a>
                    <a href="/projects" class="btn btn--ghost">View All Projects</a>
                </div>
            </div>

        </div>
    </article>

    {{-- CTA --}}
    <section class="cta-band" aria-labelledby="single-cta-title">
        <div class="cta-band__glow" aria-hidden="true"></div>
        <div class="section-inner cta-band__inner reveal">
            <h2 id="single-cta-title" class="cta-band__title">Need Custom LED Signage?</h2>
            <p class="cta-band__text">Get in touch for a free consultation and quote tailored to your project.</p>
            <div class="hero__cta">
                <a href="/contact" class="btn btn--primary">Contact Us</a>
                <a href="tel:+910000000000" class="btn btn--ghost">Call Now</a>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var reveals = document.querySelectorAll('.reveal');
            if (!('IntersectionObserver' in window)) {
                reveals.forEach(function (el) { el.classList.add('is-visible'); });
                return;
            }
            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });
            reveals.forEach(function (el) { observer.observe(el); });
        });
    </script>
@endpush
