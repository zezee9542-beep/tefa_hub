@props([
    'title' => 'Tefa-Hub | Satu Ekosistem Digital SMK Antartika 1 Sidoarjo',
    'description' => 'Satu ekosistem digital terpadu untuk pembelajaran kurikulum industri SKKNI, unit produksi BLUD Teaching Factory, PKL, dan BKK SMK Antartika 1 Sidoarjo.',
    'image' => asset('assets/logo-og.png'),
    'type' => 'website',
])

<!-- Open Graph & Social Cards -->
<meta property="og:locale" content="id_ID">
<meta property="og:type" content="{{ $type }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:site_name" content="Tefa-Hub">
<meta property="og:image" content="{{ $image }}">
<meta property="og:image:secure_url" content="{{ $image }}">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="512">
<meta property="og:image:height" content="512">
<meta property="og:image:alt" content="Logo Resmi Tefa-Hub SMK Antartika 1 Sidoarjo">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $image }}">
