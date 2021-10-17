@extends('layouts.app')

@section('title', 'Contact Us')
@section('subtitle', 'Welcome to our website')
@section('hero-classes', 'is-info')

@section('content')
    <section class="section">
      <div class="container">
        <h1 class="title">
          Send a message to our team
        </h1>
        <form action="{{ route('contact') }}" method="POST">
            @csrf
            <div class="field">
              <label class="label">Name</label>
              <div class="control">
                <input class="input" type="text" name="name" placeholder="Text input" value="{{ old('name') }}">
              </div>
              @error('email')
                <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="field">
              <label class="label">Email</label>
              <div class="control has-icons-left has-icons-right">
                <input class="input" type="email" name="email" placeholder="Email input" value="{{ old('email') }}">
                <span class="icon is-small is-left">
                  <i class="fas fa-envelope"></i>
                </span>
              </div>
              @error('email')
                <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="field">
                <label class="label">Gender</label>
              <div class="control">
                <label class="radio">
                  <input type="radio" name="gender" value="male">
                  Male
                </label>
                <label class="radio">
                  <input type="radio" name="gender" value="female">
                  Female
                </label>
              </div>
            </div>
            <div class="field">
              <label class="label">Subject</label>
              <div class="control">
                <div class="select">
                  <select name="subject">
                    <option value="question">Question</option>
                    <option value="complaint">Complaint</option>
                    <option value="thanks">Thanks</option>
                  </select>
                </div>
                @error('subject')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="field">
              <label class="label">Message</label>
              <div class="control">
                <textarea class="textarea" name="message" placeholder="Textarea">{{ old('message') }}</textarea>
              </div>
              @error('message')
                <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="field is-grouped">
              <div class="control">
                <button type="submit" class="button is-link">Submit</button>
              </div>
              <div class="control">
                <button class="button is-link is-light">Cancel</button>
              </div>
            </div>
        </form>
      </div>
    </section>
@endsection

@push('styles')
    <style>
        .hero.is-info {
            background-color: darkred;
        }
    </style>
@endpush
