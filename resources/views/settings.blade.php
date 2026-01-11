@extends('layouts.app')

@section('content')
<div class="settings-page">
    <h1>Settings</h1>

    <div class="settings-card">

        {{-- PREFERENCES --}}
        <h3 class="section-title">Preferences</h3>
        <hr>


        <form method="POST" action="{{ route('toggle.mode') }}">
            @csrf
            <div class="setting-item">
                <span>Mode</span>

                <label class="switch">
                    <input type="checkbox"
                           name="dark_mode"
                           onchange="this.form.submit()"
                           {{ session('dark_mode') ? 'checked' : '' }}>
                    <span class="slider"></span>
                </label>
            </div>
        </form>

    
        <form method="POST" action="{{ route('language.toggle') }}">
            @csrf
            <div class="setting-item">
                <span>Language</span>

                <label class="switch">
                    <input type="checkbox"
                           name="language"
                           onchange="this.form.submit()"
                           {{ session('ms') ? 'checked' : '' }}>
                    <span class="slider"></span>
                </label>
            </div>
        </form>

        {{-- PERMISSION --}}
        <h3 class="section-title">Permission</h3>
        <hr>

        <div class="setting-item">
            <span>Notification</span>
            <label class="switch">
                <input type="checkbox" onclick="testNotification(this)">
                <span class="slider"></span>
            </label>
        </div>


        <div class="setting-item">
            <span>Location</span>
            <label class="switch">
                <input type="checkbox" onclick="testLocation(this)">
                <span class="slider"></span>
            </label>
        </div>

        <script>
/* NOTIFICATION */
function testNotification(el) {
    if (!('Notification' in window)) {
        alert('Browser does not support notifications');
        el.checked = false;
        return;
    }

    Notification.requestPermission().then(permission => {
        console.log('Notification:', permission);
        if (permission !== 'granted') {
            el.checked = false;
        }
    });
}

/* LOCATION */
function testLocation(el) {
    if (!navigator.geolocation) {
        alert('Geolocation not supported');
        el.checked = false;
        return;
    }

    navigator.geolocation.getCurrentPosition(
        position => {
            console.log('Location allowed');
        },
        error => {
            el.checked = false;
        }
    );
}
</script>

@endsection

<script>

function savePermission(notification, location) {
    fetch("{{ route('settings.permission') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
            notification: notification,
            location: location
        })
    });
}

/* NOTIFICATION */
document.getElementById('notificationToggle').addEventListener('change', function () {
    if (this.checked) {
        Notification.requestPermission().then(permission => {
            if (permission === 'granted') {
                savePermission(true, false);
            } else {
                this.checked = false;
            }
        });
    } else {
        savePermission(false, false);
    }
});

/* LOCATION */
document.getElementById('locationToggle').addEventListener('change', function () {
    if (this.checked) {
        navigator.geolocation.getCurrentPosition(
            () => savePermission(true, true),
            () => this.checked = false
        );
    } else {
        savePermission(true, false);
    }
});
</script>

<script>
    console.log('SETTINGS JS LOADED');
</script>



