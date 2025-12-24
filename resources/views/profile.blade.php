@extends('layouts.app')

@section('page_title', 'User Profile')

@section('content')
    <div class="ml-card">
        <div class="ml-card__header">
            <div class="ml-card__title">User Profile</div>
            <i data-lucide="id-card"></i>
        </div>
        <div class="ml-card__body">
            <div class="ml-grid">
                <div class="ml-field ml-col-6">
                    <div class="ml-label">Full Name</div>
                    <div class="ml-strong">{{ auth()->user()->name }}</div>
                </div>
                <div class="ml-field ml-col-6">
                    <div class="ml-label">Phone</div>
                    <div class="ml-strong">{{ auth()->user()->phone }}</div>
                </div>
                <div class="ml-field ml-col-6">
                    <div class="ml-label">Email</div>
                    <div class="ml-strong">{{ auth()->user()->email }}</div>
                </div>
                <div class="ml-field ml-col-6">
                    <div class="ml-label">Role</div>
                    <div class="ml-strong ml-uppercase">{{ auth()->user()->role?->name }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
