@extends('frontend.layouts.app')

@section('title', 'Daftar Anggota Ekskul')

{{-- Link Google Fonts Poppins --}}
@section('head')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
    /* Global Styles */
    body {
        font-family: 'Poppins', sans-serif;
    }

    /* Dark Mode Styles */
    [data-bs-theme="dark"] .bg-light {
        background-color: #2d3238 !important;
    }

    [data-bs-theme="dark"] .text-secondary {
        color: rgba(255, 255, 255, 0.5) !important;
    }

    [data-bs-theme="dark"] .bg-secondary {
        background-color: #2d3238 !important;
    }

    [data-bs-theme="dark"] .section-title {
        color: #fff;
    }

    /* Card Styles and Animations */
    .card {
        transition: all 0.3s ease;
        border: none;
        background: var(--card-bg);
    }

    .ekskul-card {
        padding: 2.5rem !important;
    }

    .ekskul-card .description-preview {
        font-size: 1.2rem;
        line-height: 1.8;
        color: var(--text-color);
    }

    .ekskul-card h3 {
        font-size: 2rem;
        margin-bottom: 1.5rem;
    }

    .card.shadow-sm:hover {
        box-shadow: 0 10px 20px var(--card-hover) !important;
        transform: translateY(-5px);
    }

    /* Improved Container Spacing */
    .wide-container {
        padding-left: clamp(1rem, 5vw, 3rem);
        padding-right: clamp(1rem, 5vw, 3rem);
    }

    /* Section Headers */
    .section-title {
        position: relative;
        display: inline-block;
        padding-bottom: 10px;
    }

    .section-title::after {
        content: '';
        position: absolute;
        width: 50%;
        height: 3px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        bottom: 0;
        left: 25%;
        border-radius: 2px;
    }

    /* Card Image Effects */
    .card-img-hover {
        overflow: hidden;
        border-radius: 1rem;
    }

    .card-img-hover img {
        transition: transform 0.5s ease;
    }

    .card-img-hover:hover img {
        transform: scale(1.05);
    }

    /* Badge Styles */
    .custom-badge {
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 0.5em 1em;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    /* Scroll Animations */
    .scroll-fade {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease;
    }

    .scroll-fade.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Kegiatan Section Styles */
    .text-gradient {
        background: linear-gradient(45deg, var(--primary-color), #ff6b6b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }

    /* Filter Buttons */
    .btn-filter {
        padding: 0.6rem 1.5rem;
        border-radius: 50px;
        font-weight: 500;
        color: var(--text-muted);
        background: transparent;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .btn-filter:hover {
        color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .btn-filter.active {
        background: linear-gradient(45deg, var(--primary-color), #ff6b6b);
        color: white;
        border-color: transparent;
    }

    /* Kegiatan Card */
    .kegiatan-card {
        border-radius: 1rem;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .kegiatan-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(var(--primary-color-rgb), 0.15);
    }

    /* Card Image */
    .card-img-wrapper {
        position: relative;
        height: 240px;
        overflow: hidden;
    }

    .card-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .kegiatan-card:hover .card-img {
        transform: scale(1.1);
    }

    .placeholder-img {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(45deg, #f8f9fa, #e9ecef);
        font-size: 3rem;
        color: #adb5bd;
    }

    /* Image Overlay */
    .img-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(var(--primary-color-rgb), 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s ease;
    }

    .kegiatan-card:hover .img-overlay {
        opacity: 1;
    }

    .overlay-content {
        color: white;
        text-align: center;
        transform: translateY(20px);
        transition: all 0.3s ease;
    }

    .kegiatan-card:hover .overlay-content {
        transform: translateY(0);
    }

    .overlay-content i {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }

    /* Kegiatan Badge */
    .kegiatan-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.4rem 1rem;
        background: linear-gradient(45deg, var(--primary-color), #ff6b6b);
        color: white;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .kegiatan-badge i {
        margin-right: 5px;
        font-size: 0.8rem;
    }

    /* Modal Styles */
    .kegiatan-modal .modal-content {
        border: none;
        border-radius: 1rem;
        overflow: hidden;
    }

    .kegiatan-modal .modal-header {
        background: linear-gradient(45deg, var(--primary-color), #ff6b6b);
        color: white;
        padding: 1.5rem;
    }

    .kegiatan-modal .modal-img {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }

    .kegiatan-modal .kegiatan-info {
        max-height: 400px;
        overflow-y: auto;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: var(--card-bg);
        border-radius: 1rem;
        color: var(--text-muted);
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    .empty-state p {
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
    }

    .empty-state span {
        font-size: 0.9rem;
        opacity: 0.7;
    }

    /* Masonry Grid */
    .kegiatan-grid {
        margin-left: -15px;
        margin-right: -15px;
    }

    /* Animations */
    .kegiatan-item {
        animation: fadeInUp 0.6s ease backwards;
        animation-delay: calc(var(--animation-order) * 0.1s);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Gradient Text */
    .gradient-text {
        background: linear-gradient(45deg, var(--primary-color), #ff6b6b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }

    /* Filter Buttons */
    .kegiatan-filter {
        margin-bottom: 2rem;
    }

    .btn-filter {
        padding: 0.75rem 1.5rem;
        border: 2px solid var(--primary-color);
        background: transparent;
        color: var(--text-color);
        border-radius: 50px;
        margin: 0 0.5rem;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .btn-filter:hover, .btn-filter.active {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
    }

    /* Kegiatan Card */
    .kegiatan-card {
        background: var(--card-bg);
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        cursor: pointer;
    }

    .kegiatan-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 30px rgba(0,0,0,0.15);
    }

    /* Card Image */
    .card-image-wrapper {
        position: relative;
        height: 240px;
        overflow: hidden;
    }

    .kegiatan-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .placeholder-image {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(45deg, #f8f9fa, #e9ecef);
        font-size: 3rem;
        color: #adb5bd;
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .kegiatan-card:hover .image-overlay {
        opacity: 1;
    }

    .overlay-text {
        color: white;
        font-weight: 500;
        transform: translateY(20px);
        transition: transform 0.3s ease;
    }

    .kegiatan-card:hover .overlay-text {
        transform: translateY(0);
    }

    /* Card Content */
    .card-content {
        padding: 1.5rem;
    }

    .kegiatan-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--text-color);
    }

    .kegiatan-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1rem;
        background: linear-gradient(45deg, var(--primary-color), #ff6b6b);
        color: white;
        border-radius: 50px;
        font-size: 0.875rem;
        font-weight: 500;
        margin-bottom: 1rem;
    }

    .kegiatan-preview {
        color: var(--text-muted);
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    .kegiatan-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        font-size: 0.875rem;
        color: var(--text-muted);
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Modal Styles */
    .kegiatan-modal .modal-content {
        border: none;
        border-radius: 1rem;
        overflow: hidden;
    }

    .kegiatan-modal .modal-header {
        background: linear-gradient(45deg, var(--primary-color), #ff6b6b);
        color: white;
        border: none;
    }

    .kegiatan-modal .btn-close {
        color: white;
    }

    .modal-image {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
        border-radius: 0.5rem;
    }

    .kegiatan-details {
        line-height: 1.8;
        color: var(--text-color);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: var(--card-bg);
        border-radius: 1rem;
        color: var(--text-muted);
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1rem;
        color: var(--primary-color);
    }

    .empty-state p {
        font-size: 1.25rem;
        margin-bottom: 0.5rem;
    }

    .empty-state span {
        font-size: 0.875rem;
    }

    /* Masonry Grid */
    .kegiatan-grid {
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .kegiatan-grid.loaded {
        opacity: 1;
    }

    /* Card Image */
    .card-image-wrapper {
        position: relative;
        height: 180px; /* Reduced from 240px */
        overflow: hidden;
    }

    .kegiatan-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    /* Modal Image */
    .modal-image {
        width: 100%;
        max-height: 300px; /* Reduced from 400px */
        object-fit: cover;
        border-radius: 0.5rem;
    }

    /* Kegiatan Grid */
    .kegiatan-grid {
        margin: 0 auto;
        max-width: 1200px;
    }

    /* Card Styles */
    .kegiatan-card {
        background: var(--card-bg);
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        cursor: pointer;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .kegiatan-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 30px rgba(0,0,0,0.15);
    }

    .card-image-wrapper {
        position: relative;
        height: 200px;
        overflow: hidden;
    }

    .kegiatan-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .kegiatan-card:hover .kegiatan-image {
        transform: scale(1.1);
    }

    .card-content {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .kegiatan-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--text-color);
    }

    .kegiatan-preview {
        color: var(--text-muted);
        line-height: 1.6;
        margin-bottom: 1rem;
        flex-grow: 1;
    }

    .kegiatan-meta {
        margin-top: auto;
    }

    .meta-item {
        display: flex;
        align-items: center;
        color: var(--text-muted);
        font-size: 0.875rem;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: var(--card-bg);
        border-radius: 1rem;
        color: var(--text-muted);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .empty-state i {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: var(--primary-color);
        opacity: 0.5;
    }

    /* Read More Button */
    .read-more {
        display: inline-block;
        text-decoration: none;
        color: var(--primary-color);
        font-weight: 500;
        margin-top: 0.5rem;
        transition: all 0.3s ease;
    }

    .read-more:hover {
        color: var(--primary-color);
        text-decoration: underline;
    }

    /* Kegiatan Details */
    .kegiatan-details {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--text-color);
    }

    /* Modal */
    .modal-body {
        padding: 2rem;
    }

    .modal-footer {
        border-top: none;
        padding: 0 2rem 2rem;
    }

    .btn-secondary {
        background: var(--text-muted);
        border: none;
        padding: 0.5rem 2rem;
        border-radius: 50px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background: var(--text-color);
        transform: translateY(-2px);
    }

    /* Floating Social Media Navbar */
    .floating-social {
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: flex;
        flex-direction: column;
        gap: 15px;
        background: rgba(255, 255, 255, 0.95);
        padding: 15px;
        border-radius: 20px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
        backdrop-filter: blur(10px);
        z-index: 1000;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    [data-bs-theme="dark"] .floating-social {
        background: rgba(45, 50, 56, 0.95);
    }

    .social-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        position: relative;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Instagram gradient background */
    .social-link.instagram {
        background: radial-gradient(circle at 30% 107%, #fdf497 0%, #ffd34f 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
    }

    /* WhatsApp brand color */
    .social-link.whatsapp {
        background: #25D366;
    }

    .social-link:hover {
        transform: scale(1.15) rotate(5deg);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    /* Pulse animation on hover */
    .social-link::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: inherit;
        border-radius: 50%;
        z-index: -1;
        animation: none;
        opacity: 0.7;
    }

    .social-link:hover::after {
        animation: pulse 1s cubic-bezier(0.66, 0, 0, 1) infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
            opacity: 0.7;
        }
        100% {
            transform: scale(1.5);
            opacity: 0;
        }
    }

    /* Tooltip styles */
    .social-link::before {
        content: attr(data-tooltip);
        position: absolute;
        right: 120%;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 14px;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .social-link:hover::before {
        opacity: 1;
        visibility: visible;
    }

    .social-icon {
        width: 30px;
        height: 30px;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    [data-bs-theme="dark"] .social-icon {
        filter: brightness(0) invert(1);
    }

    /* Active state */
    .social-link:active {
        transform: scale(0.95);
    }

    @media (max-width: 768px) {
        .floating-social {
            bottom: 15px;
            right: 15px;
        }

        .social-link {
            width: 45px;
            height: 45px;
        }

        .social-icon {
            width: 25px;
            height: 25px;
        }

        /* Hide tooltips on mobile */
        .social-link::before {
            display: none;
        }
    }

    /* Add pulse animation */
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    .floating-social {
        animation: pulse 2s infinite;
    }

    .floating-social:hover {
        animation: none;
    }
</style>

<script>
    // Scroll Animation
    document.addEventListener('DOMContentLoaded', function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.scroll-fade').forEach(el => observer.observe(el));

        // Image error handling
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('error', function() {
                this.onerror = null;
                this.src = '{{ asset('/img/logo-sekolah.png') }}';
                this.alt = 'Default Image';
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Masonry
        var grid = document.querySelector('.kegiatan-grid');
        var masonry = new Masonry(grid, {
            itemSelector: '.kegiatan-item',
            percentPosition: true
        });

        // Set animation order
        document.querySelectorAll('.kegiatan-item').forEach((item, index) => {
            item.style.setProperty('--animation-order', index);
        });

        // Filter functionality
        const filterButtons = document.querySelectorAll('.btn-filter');
        const kegiatanItems = document.querySelectorAll('.kegiatan-item');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                button.classList.add('active');

                const filterValue = button.getAttribute('data-filter');

                kegiatanItems.forEach(item => {
                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Re-layout Masonry
                masonry.layout();
            });
        });

        // Modal functionality
        window.openKegiatanModal = function(modalId) {
            const modal = new bootstrap.Modal(document.getElementById(modalId));
            modal.show();
        };

        // Image error handling
        document.querySelectorAll('.card-img').forEach(img => {
            img.addEventListener('error', function() {
                this.style.display = 'none';
                this.parentElement.innerHTML = `
                    <div class="placeholder-img">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                `;
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Masonry
        var msnry = new Masonry('.kegiatan-grid .row', {
            itemSelector: '.kegiatan-item',
            percentPosition: true
        });

        // Show grid after layout
        setTimeout(() => {
            document.querySelector('.kegiatan-grid').classList.add('loaded');
        }, 100);

        // Initialize Modals
        const modals = document.querySelectorAll('.kegiatan-modal');
        modals.forEach(modal => {
            new bootstrap.Modal(modal);
        });
    });

    // Function to open kegiatan modal
    function openKegiatanModal(modalId) {
        const modal = new bootstrap.Modal(document.getElementById(modalId));
        modal.show();
    }
</script>
@endsection

@section('content')
<div class="container-fluid wide-container py-5">



    {{-- Hero Section --}}
    <div class="hero-section p-5 rounded-4 shadow mb-5 text-center position-relative overflow-hidden">
        <div class="hero-content">
            <div class="d-flex align-items-center justify-content-center mb-4 flex-wrap">
                <img src="{{ asset('/img/logo-sekolah.png') }}" alt="Logo Sekolah" class="hero-logo animate-float">
                <h1 class="display-4 fw-bold text-gradient mb-0">Selamat Datang di Halaman Ekstrakurikuler</h1>
            </div>
            <p class="lead mb-4 text-muted">Mari bergabung dan kembangkan bakatmu bersama kami!</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="#ekskul-section" class="btn btn-primary btn-lg px-4">
                  
                </a>

            </div>
        </div>
        <div class="hero-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>
    </div>

    <style>
    .hero-section {
        background: var(--card-bg);
        position: relative;
        z-index: 1;
        overflow: hidden;
    }

    [data-bs-theme="dark"] .hero-section {
        background: linear-gradient(135deg, #1a1d20, #2d3238);
    }

    .hero-logo {
        height: 80px;
        width: auto;
        margin-right: 20px;
    }

    .text-gradient {
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .animate-float {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    .hero-shapes .shape {
        position: absolute;
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        border-radius: 50%;
        opacity: 0.1;
    }

    .shape-1 {
        width: 150px;
        height: 150px;
        top: -50px;
        right: -50px;
    }

    .shape-2 {
        width: 100px;
        height: 100px;
        bottom: -30px;
        left: -30px;
    }

    .shape-3 {
        width: 70px;
        height: 70px;
        bottom: 50%;
        right: 10%;
    }

    [data-bs-theme="dark"] .card {
        background-color: var(--card-bg);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    [data-bs-theme="dark"] .text-muted {
        color: rgba(255, 255, 255, 0.6) !important;
    }
    </style>

    {{-- Section Profil Ekskul --}}
    <div class="mb-5" id="ekskul-section">
        <h2 class="fw-bold section-title text-center display-5 mb-4">Profil Ekskul</h2>
        <p class="text-center text-muted mb-5">Temukan berbagai kegiatan ekstrakurikuler yang sesuai dengan minat dan bakatmu</p>

        <div class="row justify-content-center gy-5">
            @forelse($ekskul as $esk)
                {{-- Ekskul wrapper --}}
                <div class="ekskul-wrapper" data-ekskul-id="{{ $esk->id }}">
                    {{-- Ekskul Card --}}
                    <div class="col-12 col-lg-10 mx-auto">
                        <div class="card shadow-sm rounded-4 border-0 p-4 ekskul-card"
                             onclick="openEkskulModal('ekskulModal_{{ $esk->id }}')"
                             style="cursor: pointer; background-color: transparent; transition: all 0.3s ease;">
                            <div class="row g-0 align-items-center">
                                {{-- Deskripsi Ekskul --}}
                                <div class="col-12 col-md-8 pe-md-5" style="font-family: 'Poppins', sans-serif; font-size: 1.15rem; color: var(--text-color); line-height: 1.7;">
                                    <h3 class="fw-bold text-primary mb-3">{{ $esk->nama_ekskul }}</h3>
                                    <div class="description-preview">
                                        @php
                                            $description = $esk->deskripsi ?? 'Deskripsi ekstrakurikuler belum tersedia.';
                                            // Replace multiple newlines with paragraphs
                                            $description = preg_replace('/\n\s*\n/', '</p><p>', $description);
                                            // Convert remaining newlines to <br>
                                            $description = nl2br($description);
                                            // Get first 150 characters but preserve word boundaries
                                            $shortDesc = \Str::words(strip_tags($description), 30, '...');
                                        @endphp
                                        <p class="mb-0" style="white-space: pre-line;">
                                            {!! $shortDesc !!}
                                            @if(strlen(strip_tags($description)) > strlen(strip_tags($shortDesc)))
                                                <span class="text-primary read-more">Baca selengkapnya...</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                {{-- Logo Ekskul --}}
                                <div class="col-12 col-md-4 d-flex justify-content-center mt-4 mt-md-0">
                                    @if($esk->logo)
                                        <div class="logo-wrapper">
                                            <img src="{{ asset('storage/' . $esk->logo) }}"
                                                 alt="{{ $esk->nama_ekskul }}"
                                                 class="img-fluid rounded-circle shadow ekskul-logo"
                                                 style="width: 250px; height: 250px; object-fit: cover; border: 5px solid var(--primary-color);">
                                        </div>
                                    @else
                                        <div class="d-flex justify-content-center align-items-center bg-light rounded-circle shadow"
                                             style="width: 250px; height: 250px; border: 5px solid var(--primary-color);">
                                            <i class="fa-solid fa-school fa-5x text-primary"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal for this Ekskul --}}
                    <div class="modal fade" id="ekskulModal_{{ $esk->id }}" tabindex="-1" aria-labelledby="ekskulModalLabel_{{ $esk->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ekskulModalLabel_{{ $esk->id }}">{{ $esk->nama_ekskul }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center mb-4">
                                        @if($esk->logo)
                                            <img src="{{ asset('storage/' . $esk->logo) }}"
                                                 alt="{{ $esk->nama_ekskul }}"
                                                 class="img-fluid rounded-circle shadow-sm mb-3"
                                                 style="max-width: 280px; max-height: 280px; object-fit: cover; border: 5px solid var(--primary-color);">
                                        @else
                                            <div class="d-flex justify-content-center align-items-center bg-light rounded-circle mx-auto mb-3"
                                                 style="width: 280px; height: 280px; border: 5px solid var(--primary-color);">
                                                <i class="fa-solid fa-school fa-5x text-primary"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="description-content" style="font-size: 1.1rem; line-height: 1.7;">
                                        {!! nl2br(e($esk->deskripsi)) !!}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted fst-italic">Belum ada data ekstrakurikuler.</p>
            @endforelse
        </div>
    </div>


{{-- Section Pembina Ekskul --}}
<div class="mb-5 px-4" id="daftar-pembina-section">
    <h2 class="fw-bold section-title text-center display-5 mb-4">Pembina Ekskul</h2>
    <p class="text-center text-muted mb-5">Kenali para pembina yang akan membimbing perjalananmu</p>

    <div class="row justify-content-center gy-5">
        @forelse($pembina as $p)
            {{-- Pembina wrapper --}}
            <div class="pembina-wrapper" data-pembina-id="{{ $p->nip }}">
                {{-- Pembina Card --}}
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="card shadow-sm rounded-4 border-0 p-4 pembina-card"
                         onclick="openPembinaModal('pembinaModal_{{ $p->nip }}')"
                         style="cursor: pointer; background-color: transparent; transition: all 0.3s ease;">
                        <div class="row g-0 align-items-center">
                            {{-- Deskripsi Pembina --}}
                            <div class="col-12 col-md-8 pe-md-5" style="font-family: 'Poppins', sans-serif; font-size: 1.15rem; color: var(--text-color); line-height: 1.7;">
                                <h3 class="fw-bold text-primary mb-3">{{ $p->nama_pembina }}</h3>
                                <div class="pembina-badge mb-4">
                                    <i class="fas fa-star me-2"></i>
                                    Pembina {{ $p->ekskul->nama_ekskul ?? 'Ekskul' }}
                                </div>
                                <div class="description-preview">
                                    @php
                                        $description = $p->deskripsi ?? 'Deskripsi pembina belum tersedia.';
                                        // Replace multiple newlines with paragraphs
                                        $description = preg_replace('/\n\s*\n/', '</p><p>', $description);
                                        // Convert remaining newlines to <br>
                                        $description = nl2br($description);
                                        // Get first 150 characters but preserve word boundaries
                                        $shortDesc = \Str::words(strip_tags($description), 30, '...');
                                    @endphp
                                    <p class="mb-0" style="white-space: pre-line;">
                                        {!! $shortDesc !!}
                                        @if(strlen(strip_tags($description)) > strlen(strip_tags($shortDesc)))
                                            <span class="text-primary read-more">Baca selengkapnya...</span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            {{-- Foto Pembina --}}
                            <div class="col-12 col-md-4 d-flex justify-content-center mt-4 mt-md-0">
                                @if($p->foto_profil)
                                    <div class="foto-wrapper">
                                        <img src="{{ asset('storage/' . $p->foto_profil) }}"
                                             alt="Foto {{ $p->nama_pembina }}"
                                             class="img-fluid rounded-circle shadow pembina-portrait"
                                             style="width: 220px; height: 220px; object-fit: cover; border: 5px solid var(--primary-color);">
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center align-items-center bg-light rounded-circle shadow"
                                         style="width: 220px; height: 220px; border: 5px solid var(--primary-color);">
                                        <i class="fas fa-user-tie fa-4x text-primary"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                {{-- Modal Pembina --}}
                <div class="modal fade" id="pembinaModal_{{ $p->nip }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold">{{ $p->nama_pembina }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-0">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <div class="modal-image h-100">
                                            @if($p->foto_profil)
                                                <img src="{{ asset('storage/' . $p->foto_profil) }}"
                                                     alt="Foto {{ $p->nama_pembina }}"
                                                     class="w-100 h-100"
                                                     style="object-fit: cover;">
                                            @else
                                                <div class="d-flex justify-content-center align-items-center h-100 bg-light">
                                                    <i class="fas fa-user-tie fa-5x text-secondary"></i>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="p-4">
                                            <div class="pembina-badge mb-4">
                                                <i class="fas fa-star me-2"></i>
                                                Pembina {{ $p->ekskul->nama_ekskul ?? 'Ekskul' }}
                                            </div>
                                            <div class="pembina-description">
                                                @php
                                                    $description = $p->deskripsi ?? 'Deskripsi pembina belum tersedia.';
                                                    // Replace multiple newlines with paragraphs
                                                    $description = preg_replace('/\n\s*\n/', '</p><p>', $description);
                                                    // Convert remaining newlines to <br>
                                                    $description = nl2br($description);
                                                    // Wrap in paragraph if not already
                                                    if (!str_starts_with(trim($description), '<p>')) {
                                                        $description = '<p>' . $description . '</p>';
                                                    }
                                                @endphp
                                                <div style="white-space: pre-line;">
                                                    {!! $description !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <div class="empty-state">
                        <i class="fas fa-users fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Belum ada data pembina.</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>

<style>
    .pembina-card {
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        overflow: hidden;
        background: var(--card-bg);
        position: relative;
        border-radius: 1rem;
        height: 100%;
    }

    .pembina-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        opacity: 0;
        z-index: -1;
        transition: opacity 0.4s ease;
        border-radius: 1rem;
    }

    .pembina-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 15px 30px rgba(var(--primary-color-rgb), 0.15) !important;
    }

    .pembina-card:hover::before {
        opacity: 0.1;
    }

    .pembina-wrapper {
        margin-bottom: 2rem;
    }

    .foto-wrapper {
        position: relative;
        transition: transform 0.5s ease;
    }

    .pembina-card:hover .foto-wrapper {
        transform: scale(1.05);
    }

    .pembina-portrait {
        transition: transform 0.5s ease;
        box-shadow: 0 10px 25px rgba(var(--primary-color-rgb), 0.2);
    }

    .pembina-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        color: white;
        border-radius: 50px;
        font-size: 1rem;
        font-weight: 500;
        box-shadow: 0 4px 15px rgba(var(--primary-color-rgb), 0.2);
    }

    .description-preview {
        font-size: 1.1rem;
        line-height: 1.7;
        color: var(--text-muted);
    }

    .read-more {
        display: inline-block;
        margin-top: 0.5rem;
        font-weight: 500;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .read-more:hover {
        color: var(--primary-color-hover);
    }

    /* Modal improvements */
    .modal.fade .modal-dialog {
        transform: scale(0.7);
        transition: transform 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        opacity: 0;
    }

    .modal.show .modal-dialog {
        transform: scale(1);
        opacity: 1;
    }

    .modal-content {
        border: none;
        border-radius: 1.5rem;
        overflow: hidden;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        color: white;
        border: none;
        padding: 1.5rem;
    }

    .modal-header .btn-close {
        color: white;
        opacity: 0.8;
        transition: opacity 0.2s ease;
    }

    .modal-header .btn-close:hover {
        opacity: 1;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Store modal instances
    let modalInstances = new Map();

    // Initialize all modals
    document.querySelectorAll('.modal').forEach(modalElement => {
        const modal = new bootstrap.Modal(modalElement, {
            backdrop: 'static',  // Prevent closing when clicking outside
            keyboard: false      // Prevent closing with ESC key
        });
        modalInstances.set(modalElement.id, modal);

        // Close button handler
        modalElement.querySelectorAll('[data-bs-dismiss="modal"]').forEach(closeBtn => {
            closeBtn.addEventListener('click', function() {
                modal.hide();
                cleanupModals();
            });
        });
    });

    // Clean up function for modals
    function cleanupModals() {
        const modalBackdrops = document.querySelectorAll('.modal-backdrop');
        modalBackdrops.forEach(backdrop => backdrop.remove());
        document.body.classList.remove('modal-open');
        document.body.style.overflow = '';
        document.body.style.paddingRight = '';
    }

    // Modal open functions
    window.openEkskulModal = function(modalId) {
        cleanupModals();
        const modalInstance = modalInstances.get(modalId);
        if (modalInstance) {
            modalInstance.show();
        }
    };

    window.openPembinaModal = function(modalId) {
        cleanupModals();
        const modalInstance = modalInstances.get(modalId);
        if (modalInstance) {
            modalInstance.show();
        }
    };
});
</script>

   {{-- Bagian Daftar Anggota Ekskul Berdasarkan Generasi --}}
<div class="mb-5" id="anggota-section">
    <h2 class="fw-bold section-title text-center display-5 mb-4">Daftar Anggota Ekstrakurikuler</h2>
    <p class="text-center text-muted mb-5">Kenali rekan-rekan ekstrakurikulermu dari berbagai generasi</p>

    {{-- Filter Dropdown with improved styling --}}
    <div class="text-center mb-4">
        <form method="GET" action="{{ url()->current() }}" class="generation-filter">
            <div class="d-inline-block position-relative">
                <select name="generasi" onchange="this.form.submit()" class="form-select custom-select">
                    <option value="">-- Semua Generasi --</option>
                    @foreach(($generasiList ?? collect([])) as $gen)
                        <option value="{{ $gen }}" {{ request('generasi') == $gen ? 'selected' : '' }}>
                            Generasi {{ $gen }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

    <style>
        .generation-filter .custom-select {
            background-color: var(--card-bg);
            border: 2px solid var(--primary-color);
            border-radius: 20px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
            min-width: 200px;
        }

        .generation-filter .custom-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(253, 13, 13, 0.25);
        }

        .member-card {
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            overflow: hidden;
        }

        .member-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            opacity: 0;
            z-index: -1;
            transition: opacity 0.3s ease;
            border-radius: 1rem;
        }

        .member-card:hover {
            transform: translateY(-10px) scale(1.02);
        }

        .member-card:hover::after {
            opacity: 0.1;
        }

        .member-card .card-img-wrapper {
            overflow: hidden;
            border-radius: 1rem 1rem 0 0;
            position: relative;
        }

        .member-card .card-img-wrapper img,
        .member-card .card-img-wrapper .placeholder {
            transition: transform 0.5s ease;
        }

        .member-card:hover .card-img-wrapper img,
        .member-card:hover .card-img-wrapper .placeholder {
            transform: scale(1.1);
        }

        .member-info {
            padding: 1.25rem;
            text-align: center;
        }

        .member-name {
            color: var(--text-color);
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .member-role {
            font-size: 0.9rem;
            color: var(--primary-color);
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .status-badge {
            padding: 0.35rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-top: 0.5rem;
            color: white;
        }

        .status-badge i {
            font-size: 0.75rem;
        }

        .member-department {
            margin-top: 0.75rem;
            font-size: 0.9rem;
            color: var(--text-color);
            opacity: 0.7;
        }

        .generation-number {
            display: inline-block;
            position: relative;
            padding: 0.5rem 2rem;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 25px;
            font-size: 1.2rem;
            box-shadow: 0 4px 15px rgba(253, 13, 13, 0.2);
        }

        .empty-state {
            padding: 3rem;
            background: var(--card-bg);
            border-radius: 1rem;
            text-align: center;
        }
    </style>

    @php
        // Memastikan $anggota tidak null sebelum grouping
        $groupedAnggota = isset($anggota) ? $anggota->groupBy('generasi') : collect([]);

        // Mapping prioritas jabatan
        $prioritasJabatan = [
            'ketua' => 1,
            'wakil' => 2,
            'sekretaris' => 3,
            'bendahara' => 4,
            'anggota' => 5,
            'npc' => 6,
        ];
    @endphp

    @forelse ($groupedAnggota as $generasi => $items)
        @php
            $sortedItems = $items->sortBy(function($item) use ($prioritasJabatan) {
                $jabatan = strtolower($item->jabatan->nama_jabatan ?? 'anggota');
                return $prioritasJabatan[$jabatan] ?? 999;
            });
        @endphp

        <div class="mb-4">
            <h3 class="text-center text-secondary fw-bold mb-4">
                <span class="generation-number">Generasi {{ $generasi }}</span>
            </h3>
            <div class="row g-4 justify-content-center">
                @foreach($sortedItems as $item)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card member-card border-0 h-100">
                            <div class="card-img-wrapper">
                                @if($item->foto_profil)
                                    <img src="{{ asset('storage/' . $item->foto_profil) }}"
                                         alt="{{ $item->nama_anggota }}"
                                         class="w-100"
                                         style="height: 250px; object-fit: cover;">
                                @else
                                    <div class="placeholder d-flex justify-content-center align-items-center bg-light"
                                         style="height: 250px;">
                                        <i class="fa-solid fa-user fa-3x text-secondary"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="member-info">
                                <h5 class="member-name">{{ $item->nama_anggota }}</h5>
                                <div class="member-role">
                                    <i class="fas fa-user-tag me-1"></i>
                                    {{ $item->jabatan->nama_jabatan ?? 'Anggota' }}
                                </div>
                                <div class="status-badge bg-{{ $item->status === 'aktif' ? 'success' : 'secondary' }}">
                                    <i class="fas fa-{{ $item->status === 'aktif' ? 'circle-check' : 'circle-minus' }}"></i>
                                    {{ ucfirst($item->status) }}
                                </div>
                                <div class="member-department">
                                    <i class="fas fa-graduation-cap me-1"></i>
                                    {{ $item->jurusan }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <div class="text-center py-5">
            <div class="empty-state">
                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                <p class="text-muted">Belum ada data anggota untuk generasi ini.</p>
            </div>
        </div>
    @endforelse
</div>


{{-- Section Kegiatan Ekskul --}}
<div class="mb-5" id="daftar-kegiatan-section">
    <h2 class="fw-bold section-title text-center display-5 mb-4">
        <span class="gradient-text">Daftar Kegiatan Ekskul</span>
    </h2>
    <p class="text-center text-muted mb-5">Jelajahi berbagai kegiatan menarik dari ekstrakurikuler kami</p>

    {{-- Kegiatan Grid --}}
    <div class="kegiatan-grid">
        <div class="row justify-content-center g-4">
            @forelse($kegiatan as $keg)
                <div class="col-sm-6 col-lg-4">
                    <div class="kegiatan-card h-100">
                        {{-- Gambar dengan overlay --}}
                        <div class="card-image-wrapper">
                            @if($keg->foto)
                                <img src="{{ asset('storage/' . $keg->foto) }}"
                                     alt="{{ $keg->nama_kegiatan }}"
                                     class="kegiatan-image"
                                     loading="lazy">
                            @else
                                <div class="placeholder-image">
                                    <i class="fa-solid fa-calendar-days"></i>
                                </div>
                            @endif
                            <div class="image-overlay">
                                <span class="overlay-text">Lihat Detail</span>
                            </div>
                        </div>

                        {{-- Konten --}}
                        <div class="card-content">
                            <h5 class="kegiatan-title">{{ $keg->nama_kegiatan }}</h5>
                            @php
                                $plainText = strip_tags($keg->deskripsi ?? 'Tidak ada deskripsi.');
                                $shortDesc = Str::limit($plainText, 100);
                            @endphp
                            <div class="kegiatan-preview">
                                <p>{{ $shortDesc }}</p>
                                @if(strlen($plainText) > 100)
                                    <button class="btn btn-link text-primary p-0 read-more" onclick="openKegiatanModal('kegiatanModal_{{ $keg->id }}')">
                                        Baca selengkapnya...
                                    </button>
                                @endif
                            </div>
                            <div class="kegiatan-meta">
                                <span class="meta-item">
                                    <i class="far fa-calendar me-2"></i>
                                    {{ $keg->tanggal ? \Carbon\Carbon::parse($keg->tanggal)->translatedFormat('d M Y') : '-' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Modal for detailed view --}}
                    <div class="modal fade kegiatan-modal" id="kegiatanModal_{{ $keg->id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $keg->nama_kegiatan }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    @if($keg->foto)
                                        <img src="{{ asset('storage/' . $keg->foto) }}"
                                             alt="{{ $keg->nama_kegiatan }}"
                                             class="modal-image mb-4"
                                             loading="lazy">
                                    @endif
                                    <div class="kegiatan-details">
                                        {!! $keg->deskripsi ?? 'Tidak ada deskripsi.' !!}
                                    </div>
                                    <div class="kegiatan-meta mt-4">
                                        <div class="meta-item mb-2">
                                            <i class="far fa-calendar me-2"></i>
                                            <strong>Tanggal:</strong>
                                            {{ $keg->tanggal ? \Carbon\Carbon::parse($keg->tanggal)->translatedFormat('d M Y') : '-' }}
                                        </div>
                                        @if($keg->waktu)
                                        <div class="meta-item mb-2">
                                            <i class="far fa-clock me-2"></i>
                                            <strong>Waktu:</strong>
                                            {{ $keg->waktu }}
                                        </div>
                                        @endif
                                        @if($keg->lokasi)
                                        <div class="meta-item">
                                            <i class="fas fa-map-marker-alt me-2"></i>
                                            <strong>Lokasi:</strong>
                                            {{ $keg->lokasi }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-state">
                        <i class="fas fa-calendar-xmark"></i>
                        <p>Belum ada data kegiatan.</p>
                        <span>Kegiatan akan ditampilkan di sini setelah ditambahkan.</span>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

<style>
    /* Kegiatan Grid */
    .kegiatan-grid {
        margin: 0 auto;
        max-width: 1200px;
    }

    /* Card Styles */
    .kegiatan-card {
        background: var(--card-bg);
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        cursor: pointer;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .kegiatan-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 30px rgba(0,0,0,0.15);
    }

    .card-image-wrapper {
        position: relative;
        height: 200px;
        overflow: hidden;
    }

    .kegiatan-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .kegiatan-card:hover .kegiatan-image {
        transform: scale(1.1);
    }

    .card-content {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .kegiatan-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--text-color);
    }

    .kegiatan-preview {
        color: var(--text-muted);
        line-height: 1.6;
        margin-bottom: 1rem;
        flex-grow: 1;
    }

    .kegiatan-meta {
        margin-top: auto;
    }

    .meta-item {
        display: flex;
        align-items: center;
        color: var(--text-muted);
        font-size: 0.875rem;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: var(--card-bg);
        border-radius: 1rem;
        color: var(--text-muted);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .empty-state i {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: var(--primary-color);
        opacity: 0.5;
    }

    /* Read More Button */
    .read-more {
        display: inline-block;
        text-decoration: none;
        color: var(--primary-color);
        font-weight: 500;
        margin-top: 0.5rem;
        transition: all 0.3s ease;
    }

    .read-more:hover {
        color: var(--primary-color);
        text-decoration: underline;
    }

    /* Kegiatan Details */
    .kegiatan-details {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--text-color);
    }

    /* Modal */
    .modal-body {
        padding: 2rem;
    }

    .modal-footer {
        border-top: none;
        padding: 0 2rem 2rem;
    }

    .btn-secondary {
        background: var(--text-muted);
        border: none;
        padding: 0.5rem 2rem;
        border-radius: 50px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background: var(--text-color);
        transform: translateY(-2px);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Modals
    document.querySelectorAll('.kegiatan-modal').forEach(modal => {
        new bootstrap.Modal(modal);
    });
});

// Function to open kegiatan modal
function openKegiatanModal(modalId) {
    const modal = new bootstrap.Modal(document.getElementById(modalId));
    modal.show();
}
</script>

{{-- Floating Social Media Navbar --}}
<div class="floating-social">
    <a href="https://www.instagram.com/japanclub_1garut/" target="_blank" class="social-link" title="Instagram">
        <img src="https://img.icons8.com/?size=100&id=Xy10Jcu1L2Su&format=png&color=000000" alt="Instagram" class="social-icon">
    </a>

</div>

<style>
.floating-social {
    position: fixed;
    bottom: 20px;
    right: 20px;
    display: flex;
    flex-direction: column;
    gap: 15px;
    background: rgba(255, 255, 255, 0.95);
    padding: 15px;
    border-radius: 20px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
    backdrop-filter: blur(10px);
    z-index: 1000;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.floating-social:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
}

[data-bs-theme="dark"] .floating-social {
    background: rgba(45, 50, 56, 0.95);
}

.social-link {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    border-radius: 15px;
    background: white;
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    overflow: hidden;
}

[data-bs-theme="dark"] .social-link {
    background: rgba(60, 65, 71, 0.95);
}

.social-link::before {
    content: attr(data-tooltip);
    position: absolute;
    right: 120%;
    top: 50%;
    transform: translateY(-50%) scale(0.8);
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 8px 15px;
    border-radius: 10px;
    font-size: 14px;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.social-link:hover::before {
    opacity: 1;
    visibility: visible;
    transform: translateY(-50%) scale(1);
}

.social-link:hover {
    transform: translateY(-5px) rotate(5deg);
}

.social-link:active {
    transform: scale(0.95);
}

.social-icon {
    width: 30px;
    height: 30px;
    object-fit: contain;
    transition: all 0.3s ease;
}

.social-link:hover .social-icon {
    transform: scale(1.2);
}

/* Instagram specific styles */
.social-link.instagram {
    background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
    box-shadow: 0 5px 15px rgba(214, 36, 159, 0.3);
}

.social-link.instagram .social-icon {
    filter: brightness(0) invert(1);
}

/* WhatsApp specific styles */
.social-link.whatsapp {
    background: #25D366;
    box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
}

.social-link.whatsapp .social-icon {
    filter: brightness(0) invert(1);
}

/* Dark mode adjustments */
[data-bs-theme="dark"] .social-link.instagram,
[data-bs-theme="dark"] .social-link.whatsapp {
    opacity: 0.9;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .floating-social {
        bottom: 15px;
        right: 15px;
        padding: 12px;
    }

    .social-link {
        width: 45px;
        height: 45px;
    }

    .social-icon {
        width: 25px;
        height: 25px;
    }

    .social-link::before {
        display: none;
    }
}

/* Add pulse animation */
@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

.floating-social {
    animation: pulse 2s infinite;
}

.floating-social:hover {
    animation: none;
}
</style>
@endsection
