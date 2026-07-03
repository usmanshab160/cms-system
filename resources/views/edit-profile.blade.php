@extends('layouts.app')

@section('title', 'Edit Profile - Clever CMS')

@section('content')

<style>
    /* ===== Edit Profile Page — Scoped Styles (epf- prefix) ===== */

    .epf-wrapper {
        font-family: 'DM Sans', sans-serif;
        background: #f8f7fc;
        min-height: 100vh;
        padding: 48px 5%;
        box-sizing: border-box;
    }

    .epf-wrapper * {
        box-sizing: border-box;
    }

    .epf-header {
        max-width: 1200px;
        margin: 0 auto 32px auto;
    }

    .epf-header h1 {
        font-family: 'Syne', sans-serif;
        font-weight: 700;
        font-size: 32px;
        color: #1a1a2e;
        margin: 0 0 6px 0;
    }

    .epf-header p {
        font-size: 15px;
        color: #6b7280;
        margin: 0;
    }

    .epf-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1.4fr;
        gap: 28px;
        align-items: start;
    }

    /* ---- Card base ---- */
    .epf-card {
        background: #ffffff;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 4px 24px rgba(124, 92, 252, 0.08);
        border: 1px solid #eee9ff;
    }

    .epf-card h2 {
        font-family: 'Syne', sans-serif;
        font-weight: 700;
        font-size: 19px;
        color: #1a1a2e;
        margin: 0 0 22px 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* ---- Avatar block ---- */
    .epf-avatar-block {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin-bottom: 28px;
        padding-bottom: 28px;
        border-bottom: 1px solid #f0edfb;
    }

    .epf-avatar {
        width: 96px;
        height: 96px;
        border-radius: 50%;
        background: linear-gradient(135deg, #7c5cfc, #a48bff);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Syne', sans-serif;
        font-weight: 700;
        font-size: 34px;
        color: #fff;
        margin-bottom: 14px;
        position: relative;
        overflow: hidden;
    }

    .epf-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .epf-avatar-upload {
        font-size: 13px;
        color: #7c5cfc;
        font-weight: 600;
        cursor: pointer;
        border: none;
        background: none;
        text-decoration: underline;
    }

    .epf-role-tag {
        display: inline-block;
        margin-top: 8px;
        padding: 4px 14px;
        border-radius: 20px;
        background: #fff1e8;
        color: #f97316;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    /* ---- Form fields ---- */
    .epf-field {
        margin-bottom: 18px;
    }

    .epf-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .epf-field label {
        display: block;
        font-size: 13px;
        font-weight: 700;
        color: #1a1a2e;
        margin-bottom: 7px;
    }

    .epf-field input,
    .epf-field select {
        width: 100%;
        padding: 12px 14px;
        border-radius: 10px;
        border: 1.5px solid #e5e1f7;
        font-family: 'DM Sans', sans-serif;
        font-size: 14px;
        color: #1a1a2e;
        background: #fbfaff;
        outline: none;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .epf-field input:focus,
    .epf-field select:focus {
        border-color: #7c5cfc;
        box-shadow: 0 0 0 3px rgba(124, 92, 252, 0.12);
        background: #fff;
    }

    .epf-field input:disabled {
        background: #f2f1f7;
        color: #9494a3;
        cursor: not-allowed;
    }

    .epf-hint {
        font-size: 12px;
        color: #9494a3;
        margin-top: 5px;
    }

    .epf-error {
        font-size: 12px;
        color: #ef4444;
        margin-top: 5px;
        font-weight: 600;
    }

    .epf-success-banner {
        background: #ecfdf3;
        border: 1px solid #b7f0cf;
        color: #15803d;
        padding: 12px 16px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    /* ---- Password field with toggle ---- */
    .epf-password-wrap {
        position: relative;
    }

    .epf-password-toggle {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        font-size: 12px;
        color: #7c5cfc;
        font-weight: 700;
    }

    .epf-divider-text {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 26px 0 20px 0;
        color: #9494a3;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .epf-divider-text::before,
    .epf-divider-text::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #eee9ff;
    }

    /* ---- Buttons ---- */
    .epf-btn {
        font-family: 'DM Sans', sans-serif;
        font-weight: 700;
        font-size: 14px;
        padding: 12px 24px;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .epf-btn-primary {
        background: #7c5cfc;
        color: #fff;
    }

    .epf-btn-primary:hover {
        background: #6a4ce0;
        transform: translateY(-1px);
    }

    .epf-btn-outline {
        background: #fff;
        color: #7c5cfc;
        border: 1.5px solid #d9d0ff;
    }

    .epf-btn-outline:hover {
        background: #f6f3ff;
    }

    .epf-btn-danger {
        background: #fff0f0;
        color: #ef4444;
    }

    .epf-btn-danger:hover {
        background: #ffe1e1;
    }

    .epf-form-actions {
        display: flex;
        gap: 12px;
        margin-top: 26px;
    }

    /* ---- Stats cards ---- */
    .epf-stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
        margin-bottom: 28px;
    }

    .epf-stat-card {
        border-radius: 14px;
        padding: 18px;
        text-align: center;
        border: 1px solid #eee9ff;
    }

    .epf-stat-card.published { background: #f2eeff; }
    .epf-stat-card.draft { background: #fef6ec; }
    .epf-stat-card.scheduled { background: #eefaf3; }

    .epf-stat-number {
        font-family: 'Syne', sans-serif;
        font-weight: 700;
        font-size: 28px;
        color: #1a1a2e;
    }

    .epf-stat-label {
        font-size: 12px;
        color: #6b7280;
        font-weight: 600;
        margin-top: 4px;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .epf-stat-card.published .epf-stat-number { color: #7c5cfc; }
    .epf-stat-card.draft .epf-stat-number { color: #f97316; }
    .epf-stat-card.scheduled .epf-stat-number { color: #16a34a; }

    /* ---- Article filter tabs ---- */
    .epf-tabs {
        display: flex;
        gap: 8px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .epf-tab {
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 700;
        border: 1.5px solid #eee9ff;
        background: #fff;
        color: #6b7280;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .epf-tab.active {
        background: #7c5cfc;
        border-color: #7c5cfc;
        color: #fff;
    }

    /* ---- Article list ---- */
    .epf-article-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        padding: 16px;
        border: 1px solid #f0edfb;
        border-radius: 12px;
        margin-bottom: 10px;
        transition: box-shadow 0.2s ease;
    }

    .epf-article-row:hover {
        box-shadow: 0 4px 14px rgba(124, 92, 252, 0.08);
    }

    .epf-article-info {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 0;
    }

    .epf-article-thumb {
        width: 52px;
        height: 52px;
        border-radius: 10px;
        object-fit: cover;
        background: #f2f1f7;
        flex-shrink: 0;
    }

    .epf-article-text {
        min-width: 0;
    }

    .epf-article-title {
        font-family: 'Syne', sans-serif;
        font-weight: 700;
        font-size: 14.5px;
        color: #1a1a2e;
        margin: 0 0 4px 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .epf-article-meta {
        font-size: 12px;
        color: #9494a3;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .epf-status-badge {
        font-size: 10.5px;
        font-weight: 700;
        padding: 3px 10px;
        border-radius: 20px;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .epf-status-badge.published { background: #e9e3ff; color: #7c5cfc; }
    .epf-status-badge.draft { background: #fef1e0; color: #f97316; }
    .epf-status-badge.scheduled { background: #dcf7e6; color: #16a34a; }

    .epf-article-actions {
        display: flex;
        gap: 8px;
        flex-shrink: 0;
    }

    .epf-icon-btn {
        width: 36px;
        height: 36px;
        border-radius: 9px;
        border: 1.5px solid #eee9ff;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
        color: #6b7280;
    }

    .epf-icon-btn.edit:hover {
        border-color: #7c5cfc;
        color: #7c5cfc;
        background: #f6f3ff;
    }

    .epf-icon-btn.delete:hover {
        border-color: #ef4444;
        color: #ef4444;
        background: #fff0f0;
    }

    .epf-empty-state {
        text-align: center;
        padding: 40px 20px;
        color: #9494a3;
        font-size: 14px;
    }

    /* ---- Delete confirm modal ---- */
    .epf-modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(26, 26, 46, 0.5);
        z-index: 999;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .epf-modal-overlay.active {
        display: flex;
    }

    .epf-modal {
        background: #fff;
        border-radius: 16px;
        padding: 28px;
        max-width: 380px;
        width: 100%;
        text-align: center;
    }

    .epf-modal h3 {
        font-family: 'Syne', sans-serif;
        font-size: 18px;
        color: #1a1a2e;
        margin: 0 0 10px 0;
    }

    .epf-modal p {
        font-size: 13.5px;
        color: #6b7280;
        margin: 0 0 22px 0;
        line-height: 1.5;
    }

    .epf-modal-actions {
        display: flex;
        gap: 10px;
        justify-content: center;
    }

    /* ---- Responsive ---- */
    @media (max-width: 960px) {
        .epf-container {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 600px) {
        .epf-wrapper {
            padding: 28px 5% 60px 5%;
        }
        .epf-header h1 {
            font-size: 26px;
        }
        .epf-row {
            grid-template-columns: 1fr;
            gap: 0;
        }
        .epf-stats-grid {
            grid-template-columns: 1fr;
        }
        .epf-card {
            padding: 20px;
        }
        .epf-article-row {
            flex-direction: column;
            align-items: flex-start;
        }
        .epf-article-actions {
            width: 100%;
            justify-content: flex-end;
        }
        .epf-form-actions {
            flex-direction: column;
        }
        .epf-btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="epf-wrapper">

    <div class="epf-header">
        <h1>Edit Profile</h1>
        <p>Manage your account details and your articles from one place.</p>
    </div>

    @if (session('success'))
        <div class="epf-container" style="margin-bottom:-10px;">
            <div class="epf-success-banner" style="grid-column: 1 / -1;">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="epf-container">

        {{-- ============ LEFT: PROFILE FORM ============ --}}
        <div class="epf-card">
            {{-- <div class="epf-avatar-block">
                <div class="epf-avatar">
                    @if($user->avatar ?? false)
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->first_name }}">
                    @else
                        {{ strtoupper(substr($user->first_name, 0, 1) . substr($user->last_name, 0, 1)) }}
                    @endif
                </div>
                <button type="button" class="epf-avatar-upload" onclick="document.getElementById('epf-avatar-input').click()">
                    Change photo
                </button>
                <input type="file" id="epf-avatar-input" name="avatar" accept="image/*" style="display:none;">
                <span class="epf-role-tag">{{ $user->role }}</span>
            </div> --}}

            <h2>👤 Account details</h2>

            <form action="{{ route('edit-profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="epf-row">
                    <div class="epf-field">
                        <label for="first_name">First name</label>
                        <input type="text" id="first_name" name="fname" value="{{  old('fname', $user->fname) }}" required> 
                         @error('fname') <div class="epf-error">{{ $message }}</div> @enderror
                    </div>
                    <div class="epf-field">
                        <label for="last_name">Last name</label>
                        <input type="text" id="last_name" name="lname" value="{{ old('lname', $user->lname) }}" required>
                         @error('lname') <div class="epf-error">{{ $message }}</div> @enderror 
                    </div>
                </div>

                <div class="epf-field">
                    <label for="email">Email address</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required> 
                    @error('email') <div class="epf-error">{{ $message }}</div> @enderror
                </div>

                <div class="epf-field">
                    <label for="role">Role</label>
                     {{-- @if($user->role === 'admin') --}}
                        {{-- <select id="role" name="role">
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="editor" {{ $user->role === 'editor' ? 'selected' : '' }}>Editor</option>
                            <option value="author" {{ $user->role === 'author' ? 'selected' : '' }}>Author</option>
                        </select> --}}
                                <select name="role">
                                    <option value="Student" {{ $user->role == 'Student' ? 'selected' : '' }}>Student</option>
                                    <option value="Developer" {{ $user->role == 'Developer' ? 'selected' : '' }}>Developer</option>
                                    <option value="Content Writer" {{ $user->role == 'Content Writer' ? 'selected' : '' }}>Content Writer</option>
                                    <option value="Marketing Manager" {{ $user->role == 'Marketing Manager' ? 'selected' : '' }}>Marketing Manager</option>
                                    <option value="Business Owner" {{ $user->role == 'Business Owner' ? 'selected' : '' }}>Business Owner</option>
                                    <option value="Other" {{ $user->role == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                 @error('role')
                                    <small class="text-danger">{{ $message }}</small>
                                 @enderror
                    {{-- @else --}}
                        {{-- <input type="text" value="{{ ucfirst($user->role) }}" disabled>
                        <div class="epf-hint">Only an admin can change your role.</div> --}}
                    {{-- @endif --}}
                </div>

                <div class="epf-divider-text">Change password</div>

                {{-- <div class="epf-field">
                    <label for="current_password">Current password</label>
                    <div class="epf-password-wrap">
                        <input type="password" id="current_password" name="current_password" placeholder="Enter current password">
                        <button type="button" class="epf-password-toggle" onclick="epfTogglePassword('current_password', this)">Show</button>
                    </div>
                    @error('current_password') <div class="epf-error">{{ $message }}</div> @enderror
                </div> --}}

                <div class="epf-row">
                    <div class="epf-field">
                        <label for="password">New password</label>
                        <div class="epf-password-wrap">
                            <input type="password" id="password" name="password" placeholder="Enter new password">
                            <button type="button" class="epf-password-toggle" onclick="epfTogglePassword('password', this)">Show</button>
                        </div>
                         @error('password') <div class="epf-error">{{ $message }}</div> @enderror
                    </div>
                    <div class="epf-field">
                        <label for="password_confirmation">Confirm password</label>
                        <div class="epf-password-wrap">
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Re-enter password">
                            <button type="button" class="epf-password-toggle" onclick="epfTogglePassword('password_confirmation', this)">Show</button>
                        </div>
                    </div>
                </div>
                <div class="epf-hint">Minimum 8 characters. Leave both password fields blank if you don't want to change it.</div>

                <div class="epf-form-actions">
                    <button type="submit" class="epf-btn epf-btn-primary">Save changes</button>
                    <a href="{{ url()->previous() }}" class="epf-btn epf-btn-outline" style="text-decoration:none;">Cancel</a>
                </div>
            </form>
        </div>

        {{-- ============ RIGHT: STATS + ARTICLES ============ --}}
        <div class="epf-card">
            <h2>📊 Your articles</h2>

            <div class="epf-stats-grid">
                <div class="epf-stat-card published">
                    <div class="epf-stat-number">{{ $publishedCount ?? 0 }}</div>
                    <div class="epf-stat-label">Published</div>
                </div>
                <div class="epf-stat-card draft">
                    <div class="epf-stat-number">{{ $draftCount ?? 0 }}</div>
                    <div class="epf-stat-label">Drafts</div>
                </div>
                <div class="epf-stat-card scheduled">
                    <div class="epf-stat-number">{{ $scheduledCount ?? 0 }}</div>
                    <div class="epf-stat-label">Scheduled</div>
                </div>
            </div>

            <div class="epf-tabs">
                <button class="epf-tab active" onclick="epfFilterArticles('all', this)">All</button>
                <button class="epf-tab" onclick="epfFilterArticles('published', this)">Published</button>
                <button class="epf-tab" onclick="epfFilterArticles('draft', this)">Drafts</button>
                <button class="epf-tab" onclick="epfFilterArticles('scheduled', this)">Scheduled</button>
            </div>

            <div id="epf-article-list">
                @forelse($articles ?? [] as $article)
                    <div class="epf-article-row" data-status="{{ $article->status }}">
                        <div class="epf-article-info">
                            <img class="epf-article-thumb"
                                 src="{{ $article->featured_image ? asset('storage/' . $article->featured_image) : asset('images/placeholder.png') }}"
                                 alt="{{ $article->title }}">
                            <div class="epf-article-text">
                                <p class="epf-article-title">{{ $article->title }}</p>
                                <div class="epf-article-meta">
                                    <span class="epf-status-badge {{ $article->status }}">{{ $article->status }}</span>
                                    <span>{{ $article->status === 'scheduled' ? $article->scheduled_at->format('d M, Y') : $article->updated_at->format('d M, Y') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="epf-article-actions">
                            <a href="{{ route('articles.edit', $article->id) }}" class="epf-icon-btn edit" title="Edit">
                                ✎
                            </a>
                            <button type="button" class="epf-icon-btn delete" title="Delete"
                                    onclick="epfOpenDeleteModal('{{ $article->id }}', '{{ addslashes($article->title) }}')">
                                🗑
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="epf-empty-state">
                        You haven't written any articles yet.
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</div>

{{-- ============ DELETE CONFIRM MODAL ============ --}}
<div class="epf-modal-overlay" id="epf-delete-modal">
    <div class="epf-modal">
        <h3>Delete article?</h3>
        <p id="epf-delete-modal-text">This action can't be undone.</p>
        <form id="epf-delete-form" method="POST" action="">
            @csrf
            @method('DELETE')
            <div class="epf-modal-actions">
                <button type="button" class="epf-btn epf-btn-outline" onclick="epfCloseDeleteModal()">Cancel</button>
                <button type="submit" class="epf-btn epf-btn-danger">Delete</button>
            </div>
        </form>
    </div>
</div>

<script>
    function epfTogglePassword(fieldId, btn) {
        const field = document.getElementById(fieldId);
        if (field.type === 'password') {
            field.type = 'text';
            btn.textContent = 'Hide';
        } else {
            field.type = 'password';
            btn.textContent = 'Show';
        }
    }

    function epfFilterArticles(status, btn) {
        document.querySelectorAll('.epf-tab').forEach(t => t.classList.remove('active'));
        btn.classList.add('active');

        document.querySelectorAll('.epf-article-row').forEach(row => {
            if (status === 'all' || row.dataset.status === status) {
                row.style.display = 'flex';
            } else {
                row.style.display = 'none';
            }
        });
    }

    function epfOpenDeleteModal(articleId, articleTitle) {
        const modal = document.getElementById('epf-delete-modal');
        const form = document.getElementById('epf-delete-form');
        const text = document.getElementById('epf-delete-modal-text');

        text.textContent = `"${articleTitle}" will be permanently deleted. This action can't be undone.`;
        form.action = `/articles/${articleId}`;
        modal.classList.add('active');
    }

    function epfCloseDeleteModal() {
        document.getElementById('epf-delete-modal').classList.remove('active');
    }

    // Avatar preview on file select
    document.getElementById('epf-avatar-input').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function (evt) {
            const avatarBox = document.querySelector('.epf-avatar');
            avatarBox.innerHTML = `<img src="${evt.target.result}" alt="preview">`;
        };
        reader.readAsDataURL(file);
    });
</script>

@endsection