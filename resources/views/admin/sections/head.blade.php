<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Home</title>
    {{-- FONTS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @livewireStyles
    @livewireScripts
    {{-- VITE STYLE AND SCRIPT --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
