@extends('layouts.app')
@section('content')

<!-- ══════ TOP NAV ══════ -->

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Success!',
    text: '{{ session('success') }}',
    timer: 3000,
    showConfirmButton: false
});
</script>
@endif

@if($errors->any())
<script>
Swal.fire({
    icon: 'error',
    title: 'Validation Error',
    html: `{!! implode('<br>', $errors->all()) !!}`
});
</script>
@endif

<!-- ══════ LAYOUT ══════ -->
<div class="layout">
 <!-- ─── MAIN ─── -->
  <main class="main">

    <!-- Page header -->
    <div class="page-header">
      <div class="page-eyebrow"><span class="page-eyebrow-dot"></span> New Blog Post</div>
      <h1 class="page-title">Create a Post</h1>
      <p class="page-subtitle">Fill in the details below. Use the editor for rich content — images, embeds, and formatting included.</p>
    </div>

    <!-- ════ FORM ════ -->
    {{-- <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" id="blogForm" novalidate> --}}
      <form action="{{ route('blog.store') }}"
      method="POST"
      enctype="multipart/form-data"
      id="blogForm"
      novalidate>
      @csrf
      {{-- <input type="hidden" name="_token" value="csrf-token-here"/> --}}

      <div class="form-layout">

        <!-- ─── LEFT / MAIN COLUMN ─── -->
        <div class="form-main-col">

          <!-- CARD 1: Basic Info -->
          <div class="form-card">
            <div class="form-card-header">
              <div class="form-card-icon">
                <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
              </div>
              <div>
                <div class="form-card-title">Basic Information</div>
                <div class="form-card-sub">Title, description, and categorisation</div>
              </div>
            </div>
            <div class="form-card-body">

              <!-- Title -->
              <div class="field">
                <label for="title">Blog Title <span class="req">*</span></label>
                <div class="input-wrap">
                  <span class="input-icon">
                    <svg viewBox="0 0 24 24"><polyline points="4 7 4 4 20 4 20 7"/><line x1="9" y1="20" x2="15" y2="20"/><line x1="12" y1="4" x2="12" y2="20"/></svg>
                  </span>
                  <input type="text" id="title" name="title" placeholder="e.g. 10 Tips for Better Content Strategy" maxlength="100"
                    oninput="updateCharCount('title','title-count',100); autoSlug();"/>
                  {{-- <input type="text" id="title" name="title" placeholder="e.g. 10 Tips for Better Content Strategy" maxlength="100" oninput="updateCharCount('title','title-count',100)"/> --}}
                </div>
                <div class="char-counter" id="title-count">0 / 100</div>
              </div>

              <!-- Slug -->
              <div class="field">
                <label for="slug">URL Slug</label>
                <p class="field-hint">Auto-generated from title. You can customise it.</p>
                <div class="input-wrap">
                  <span class="input-icon">
                    <svg viewBox="0 0 24 24"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                  </span>
                  <input type="text" id="slug" name="slug" placeholder="10-tips-for-better-content-strategy"/>
                </div>
              </div>

              <!-- Description -->
              <div class="field">
                <label for="description">Short Description <span class="req">*</span></label>
                <p class="field-hint">Shown in blog cards and as meta description. Keep under 160 chars.</p>
                <div class="input-wrap" style="position:relative;">
                  <textarea id="description" name="description" placeholder="Briefly describe what this post is about…" maxlength="160" style="padding-left:14px;" oninput="updateCharCount('description','desc-count',160)"></textarea>
                </div>
                <div class="char-counter" id="desc-count">0 / 160</div>
              </div>

              <!-- Category + Tags row -->
              <div class="row-2">
                <div class="field">
                  <label for="category">Category <span class="req">*</span></label>
                  <div class="input-wrap select-wrap">
                    <span class="input-icon">
                      <svg viewBox="0 0 24 24"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                    </span>
                    <select id="category" name="category">
                      <option value="" disabled selected>Pick a category…</option>
                      <option>Technology</option>
                      <option>Marketing</option>
                      <option>Design</option>
                      <option>Business</option>
                      <option>Tutorials</option>
                      <option>News</option>
                    </select>
                  </div>
                </div>

                <div class="field">
                  <label for="read_time">Est. Read Time (mins)</label>
                  <div class="input-wrap">
                    <span class="input-icon">
                      <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </span>
                    <input type="text" id="read_time" name="read_time" placeholder="5" style="padding-left:42px;" value="" readonly/>
                  </div>
                </div>
              </div>

              <!-- Tags -->
              {{-- <div class="field">
                <label>Tags</label>
                <p class="field-hint">Press Enter or comma to add a tag.</p>
                <div class="tags-wrap" id="tagsWrap" onclick="document.getElementById('tagInput').focus()">
                  <span class="tag-chip" data-tag="CMS">CMS <button type="button" onclick="removeTag(this,'CMS')">×</button></span>
                  <input type="text" id="tagInput" class="tags-input" placeholder="Add tag…" onkeydown="handleTag(event)"/>
                </div>
                <input type="hidden" name="tags" id="tagsHidden" value="CMS"/>
              </div> --}}

            </div>
          </div>

          <!-- CARD 2: Featured Image -->
          <div class="form-card">
            <div class="form-card-header">
              <div class="form-card-icon">
                <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
              </div>
              <div>
                <div class="form-card-title">Featured Image</div>
                <div class="form-card-sub">Main thumbnail shown in blog listing</div>
              </div>
            </div>
            <div class="form-card-body">

              <div class="img-preview-wrap" id="imgPreviewWrap">
                <img id="imgPreview" class="img-preview" src="" alt="Preview"/>
                <button type="button" class="img-preview-remove" onclick="clearImage()">
                  <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
              </div>

              {{-- ═══════════════ Upload Feature Image Section ═══════════════ --}}

              {{-- OPTION 1: Upload New Image (existing upload zone — unchanged behavior) --}}
              <div class="upload-zone" id="uploadZone">
                <input type="file" name="featured_image" accept="image/*" onchange="previewImage(event)"/>
                <div class="upload-icon">
                  <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                </div>
                <div class="upload-title">Drop your image here</div>
                <div class="upload-sub"><span>Click to browse</span> or drag & drop</div>
                <div class="upload-meta">PNG, JPG, WebP · Max 5 MB · Recommended 1200×630 px</div>
              </div>

              {{-- Selected media id (uploaded OR chosen from library) — backend reads this --}}
              <input type="hidden" name="featured_media_id" id="featuredMediaId" value="">

              {{-- OPTION 2: Choose From Media Library --}}
              <div class="or-divider">or</div>
              <button type="button" class="btn-media-library" onclick="openMediaLibrary()">
                <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 15l4-4 4 4 6-6 4 4"/></svg>
                Choose From Media Library
              </button>

              {{-- Media Library Modal --}}
              <div class="ml-overlay" id="mlOverlay">
                <div class="ml-modal">
                  <div class="ml-header">
                    <h3>Media Library</h3>
                    <button type="button" class="ml-close" onclick="closeMediaLibrary()">✕</button>
                  </div>
                  <div class="ml-search-wrap">
                    <input type="text" class="ml-search" id="mlSearch" placeholder="Search images..." oninput="filterMediaGrid()">
                  </div>
                  <div class="ml-grid" id="mlGrid"></div>
                  <div class="ml-footer">
                    <button type="button" class="ml-btn cancel" onclick="closeMediaLibrary()">Cancel</button>
                    <button type="button" class="ml-btn select" id="mlSelectBtn" disabled onclick="confirmMediaSelection()">Select Image</button>
                  </div>
                </div>
              </div>

              {{-- ═══════════════ End Upload Feature Image Section ═══════════════ --}}

              <!-- Alt text -->
              <div class="field">
                <label for="img_alt">Image Alt Text</label>
                <div class="input-wrap">
                  <span class="input-icon">
                    <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                  </span>
                  <input type="text" id="img_alt" name="img_alt" placeholder="Describe the image for accessibility…"/>
                </div>
              </div>

            </div>
          </div>

          <div class="form-card">
    <div class="form-card-header">
        <div class="form-card-icon">
            <svg viewBox="0 0 24 24">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                <polyline points="14 2 14 8 20 8"/>
                <line x1="16" y1="13" x2="8" y2="13"/>
                <line x1="16" y1="17" x2="8" y2="17"/>
                <polyline points="10 9 9 9 8 9"/>
            </svg>
        </div>
        <div>
            <div class="form-card-title">Blog Content</div>
            <div class="form-card-sub">
                Rich text editor — supports headings, lists, media embeds
            </div>
        </div>
    </div>

    <div class="form-card-body">
        <div class="field">
            <textarea
                name="content"
                id="editor"
                placeholder="Start writing your blog post…"
            ></textarea>

            <div class="word-count-bar">
                <span>
                    Word count:
                    <span class="wc-pill" id="wordCountBadge">0 words</span>
                </span>
                <span id="readTimeCalc">~0 min read</span>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

          <!-- CARD 4: Gallery Images -->
          <div class="form-card">
            <div class="form-card-header">
              <div class="form-card-icon">
                <svg viewBox="0 0 24 24"><rect x="2" y="2" width="8" height="8" rx="1"/><rect x="14" y="2" width="8" height="8" rx="1"/><rect x="2" y="14" width="8" height="8" rx="1"/><rect x="14" y="14" width="8" height="8" rx="1"/></svg>
              </div>
              <div>
                <div class="form-card-title">Gallery Images</div>
                <div class="form-card-sub">Optional inline photos for the post body</div>
              </div>
            </div>
            <div class="form-card-body">
              <div class="gallery-grid" id="galleryGrid">
                <label class="gallery-add">
                  <input type="file" name="gallery[]" multiple accept="image/*" onchange="addGalleryImages(event)"/>
                  <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                  <span>Add</span>
                </label>
              </div>

              {{-- ═══════════════ Gallery: Choose From Media Library (add-on) ═══════════════ --}}
              <div class="or-divider">or</div>
              <button type="button" class="btn-media-library" onclick="openGalleryMediaLibrary()">
                <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 15l4-4 4 4 6-6 4 4"/></svg>
                Choose From Media Library
              </button>

              {{-- Gallery Media Library Modal — reuses the same .ml-* modal component used by Featured Image --}}
              <div class="ml-overlay" id="glMlOverlay">
                <div class="ml-modal">
                  <div class="ml-header">
                    <h3>Media Library</h3>
                    <button type="button" class="ml-close" onclick="closeGalleryMediaLibrary()">✕</button>
                  </div>
                  <div class="ml-search-wrap">
                    <input type="text" class="ml-search" id="glMlSearch" placeholder="Search images..." oninput="filterGalleryMediaGrid()">
                  </div>
                  <div class="ml-grid" id="glMlGrid"></div>
                  <div class="ml-footer">
                    <span class="ml-selected-count" id="glMlSelectedCount">0 selected</span>
                    <button type="button" class="ml-btn cancel" onclick="closeGalleryMediaLibrary()">Cancel</button>
                    <button type="button" class="ml-btn select" id="glMlSelectBtn" disabled onclick="confirmGallerySelection()">Add Selected Images</button>
                  </div>
                </div>
              </div>
              {{-- ═══════════════ End Gallery: Media Library add-on ═══════════════ --}}

            </div>
          </div>

          <!-- CARD 5: Video -->
          <div class="form-card">
            <div class="form-card-header">
              <div class="form-card-icon" style="background:linear-gradient(135deg,#ff6b6b22,#f9731622);">
                <svg viewBox="0 0 24 24" style="stroke:var(--accent)"><polygon points="5 3 19 12 5 21 5 3"/></svg>
              </div>
              <div>
                <div class="form-card-title">Video</div>
                <div class="form-card-sub">Upload a file or paste a YouTube / Vimeo link</div>
              </div>
            </div>
            <div class="form-card-body">
              <div class="video-tabs">
                <button type="button" class="video-tab active" onclick="switchVideoTab('upload',this)">Upload File</button>
                <button type="button" class="video-tab" onclick="switchVideoTab('embed',this)">Embed URL</button>
              </div>

              <!-- Upload panel -->
              <div class="video-panel active" id="vp-upload">
                <div class="video-upload-zone" id="videoUploadZone">
                  <input type="file" name="video" accept="video/*" onchange="simulateUpload(event)"/>
                  <div class="video-upload-icon">
                    <svg viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                  </div>
                  <div class="upload-title" style="font-size:0.85rem;">Drop video here</div>
                  <div class="upload-sub"><span>Click to browse</span> · MP4, MOV, WebM · Max 500 MB</div>
                </div>
                <div class="video-progress-wrap" id="videoProgressWrap">
                  <div class="video-progress-bar-bg">
                    <div class="video-progress-bar-fill" id="videoProgressFill"></div>
                  </div>
                  <div class="video-progress-label" id="videoProgressLabel">Uploading… 0%</div>
                </div>
              </div>

              <!-- Embed panel -->
              <div class="video-panel" id="vp-embed">
                <div class="field">
                  <label for="video_url">Video URL</label>
                  <div class="input-wrap">
                    <span class="input-icon">
                      <svg viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                    </span>
                    <input type="url" id="video_url" name="video_url" placeholder="https://youtube.com/watch?v=…"/>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- CARD 6: SEO -->
          <div class="form-card">
            <div class="form-card-header">
              <div class="form-card-icon">
                <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
              </div>
              <div>
                <div class="form-card-title">SEO & Meta</div>
                <div class="form-card-sub">Optimise how this post appears in search engines</div>
              </div>
            </div>
            <div class="form-card-body">

              <div class="seo-score-wrap">
                <div class="seo-ring">
                  <svg viewBox="0 0 44 44">
                    <circle class="track" cx="22" cy="22" r="20"/>
                    <circle class="fill" id="seoCircle" cx="22" cy="22" r="20"/>
                  </svg>
                  <div class="seo-ring-label" id="seoScore">0</div>
                </div>
                <div class="seo-text-col">
                  <div class="seo-title">SEO Score</div>
                  <div class="seo-checks">
                    <div class="seo-check fail" id="seo-title-check">
                      <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                      Title length (50–60 chars)
                    </div>
                    <div class="seo-check fail" id="seo-desc-check">
                      <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                      Meta description (120–160 chars)
                    </div>
                    <div class="seo-check fail" id="seo-img-check">
                      <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                      Featured image present
                    </div>
                    <div class="seo-check fail" id="seo-content-check">
                      <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                      Content ≥ 300 words
                    </div>
                  </div>
                </div>
              </div>

              <div class="field">
                <label for="meta_title">Meta Title</label>
                <p class="field-hint">Defaults to post title if left blank.</p>
                <div class="input-wrap">
                  <span class="input-icon">
                    <svg viewBox="0 0 24 24"><polyline points="4 7 4 4 20 4 20 7"/><line x1="9" y1="20" x2="15" y2="20"/><line x1="12" y1="4" x2="12" y2="20"/></svg>
                  </span>
                  <input type="text" id="meta_title" name="meta_title" placeholder="SEO-friendly title…" maxlength="70" oninput="updateSeo()"/>
                </div>
              </div>

              <div class="field">
                <label for="meta_description">Meta Description</label>
                <div class="input-wrap">
                  <textarea id="meta_description" name="meta_description" placeholder="Brief summary shown in Google results…" maxlength="165" style="padding-left:14px;" oninput="updateSeo()"></textarea>
                </div>
              </div>

              <div class="field">
                <label for="focus_keyword">Focus Keyword</label>
                <div class="input-wrap">
                  <span class="input-icon">
                    <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                  </span>
                  <input type="text" id="focus_keyword" name="focus_keyword" placeholder="e.g. content marketing strategy"/>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- END MAIN COLUMN -->

        <!-- ─── PUBLISH SIDEBAR ─── -->
        <aside class="publish-sidebar">

          <!-- Publish Card -->
          <div class="publish-card">
            <div class="publish-card-header">
              <svg viewBox="0 0 24 24"><path d="M13 2L4.5 13.5H11L10 22L20.5 10H14L13 2Z"/></svg>
              Publish
            </div>
            <div class="publish-card-body">

              <div class="field">
                <label>Status</label>
                <div class="status-toggle">
                  <button type="button" class="status-opt active" onclick="setStatus(this,'draft')">Draft</button>
                  <button type="button" class="status-opt" onclick="setStatus(this,'published')">Published</button>
                  <button type="button" class="status-opt" onclick="setStatus(this,'scheduled')">Scheduled</button>
                </div>
                <input type="hidden" name="status" id="statusInput" value="draft"/>
              </div>

              <div class="field" id="scheduledField" style="display:none;">
                <label for="scheduled_at">Publish At</label>
                <div class="input-wrap">
                  <span class="input-icon">
                    <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                  </span>
                  <input type="datetime-local" id="scheduled_at" name="scheduled_at"/>
                </div>
              </div>

              <div class="pub-meta-item">
                <span class="pub-meta-label">Visibility</span>
                <span class="pub-meta-val brand">Public</span>
              </div>
              {{-- <div class="pub-meta-item">
                <span class="pub-meta-label">Author</span>
                <span class="pub-meta-val">Ali Khan</span>
              </div> --}}
              <div class="pub-meta-item">
                <span class="pub-meta-label">Last saved</span>
                <span class="pub-meta-val" id="lastSaved">—</span>
              </div>

              <button type="button" class="btn-draft" onclick="saveDraft()">
                <svg viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                Save as Draft
              </button>

              <button type="submit" class="btn-submit-main">
                <svg viewBox="0 0 24 24"><path d="M13 2L4.5 13.5H11L10 22L20.5 10H14L13 2Z"/></svg>
                Publish Post
              </button>

            </div>
          </div>

          <!-- Author Card -->
          <div class="publish-card">
            <div class="publish-card-header">
              <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              Author
            </div>
            <div class="publish-card-body">
              <div class="field">
                {{-- <label for="author">Assign Author</label> --}}
               <div class="input-wrap select-wrap">
                <div class="pub-meta-item">
                  {{-- <span class="pub-meta-val">Author</span> --}}
                <svg style="width: 20px" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                <span class="pub-meta-val">Ali Khan</span>
              </div> 
                  {{-- <span class="input-icon">
                    <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                  </span> --}}
                  {{-- <div class="pub-meta-item">
                <span class="pub-meta-label">Author</span>
                <span class="pub-meta-val">Ali Khan</span>
              </div> --}}
                  {{-- <select id="author" name="author">
                    <option>Ali Khan</option>
                    <option>Maria Reyes</option>
                    <option>James Smith</option>
                  </select>
                </div> --}}
              </div>
            </div>
          </div>

          <!-- Checklist Card -->
          <div class="publish-card">
            <div class="publish-card-header">
              <svg viewBox="0 0 24 24"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
              Pre-Publish Checklist
            </div>
            <div class="publish-card-body">
              <div class="seo-checks">
                <div class="seo-check fail" id="check-title">
                  <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                  Title added
                </div>
                <div class="seo-check fail" id="check-desc">
                  <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                  Description added
                </div>
                <div class="seo-check fail" id="check-img">
                  <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                  Featured image added
                </div>
                <div class="seo-check fail" id="check-cat">
                  <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                  Category selected
                </div>
                <div class="seo-check fail" id="check-content">
                  <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                  Content written
                </div>
              </div>
            </div>
          </div>

        </aside>
      </div><!-- end form-layout -->

    </form>

  </main>
</div>

<!-- Toast -->
<div class="toast" id="toast">
  <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
  <span id="toastMsg">Draft saved!</span>
</div>

@php
    // Pre-compute the media library payload here (plain PHP, outside <script>)
    // so the @json() call inside the script block stays a single simple variable
    // and never has to parse a nested closure/array chain.
    $mediaLibraryItemsForJs = $media->map(function ($item) {
        return [
            'id' => $item->id,
            'url' => asset('storage/' . $item->file_path),
            'filename' => $item->file_name,
        ];
    })->values()->toArray();
@endphp

<script>
  (() => {

    let editorInstance = null;
    // let galleryFiles = [];
    let hasImage = false;

    /* ───────────────── CKEditor ───────────────── */
    ClassicEditor.create(document.querySelector('#editor'), {
        toolbar: [
            'heading', '|',
            'bold', 'italic', 'underline', 'strikethrough', '|',
            'bulletedList', 'numberedList', '|',
            'link', 'blockQuote', 'insertTable', '|',
            'mediaEmbed', '|',
            'undo', 'redo'
        ]
    })
    .then(editor => {
        editorInstance = editor;

        editor.model.document.on('change:data', () => {
            const text = editor.getData().replace(/<[^>]+>/g, '');
            const words = text.trim() ? text.trim().split(/\s+/).length : 0;

            const wordCount = document.getElementById('wordCountBadge');
            if (wordCount) wordCount.textContent = words + ' word' + (words !== 1 ? 's' : '');

            const readTime = document.getElementById('readTimeCalc');
            const readInput = document.getElementById('read_time');
            const mins = Math.max(1, Math.ceil(words / 200));
            if (readTime) readTime.textContent = `~${mins} min read`;
            if (readInput) readInput.value = mins;

            updateSeo();
            updateChecklist();
        });

        // ✅ CRITICAL FIX: sync CKEditor data into the textarea before form submits
        const form = document.getElementById('blogForm');
        if (form) {
            form.addEventListener('submit', () => {
                editor.updateSourceElement(); // pushes editor content back into <textarea name="content">
            });
        }
    })
    .catch(error => console.error('CKEditor Error:', error));


    /* ───────────────── Auto Slug ───────────────── */
    window.autoSlug = function () {
        const title = document.getElementById('title');
        const slug = document.getElementById('slug');
        if (!title || !slug) return;
        slug.value = title.value
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .trim()
            .replace(/\s+/g, '-');
    };


    /* ───────────────── Char Counter ───────────────── */
    window.updateCharCount = function (fieldId, counterId, max) {
        const field = document.getElementById(fieldId);
        const counter = document.getElementById(counterId);
        if (!field || !counter) return;

        const len = field.value.length;
        counter.textContent = `${len} / ${max}`;
        counter.classList.remove('warn', 'over');
        if (len > max) counter.classList.add('over');
        else if (len > max * 0.85) counter.classList.add('warn');

        updateSeo();
        updateChecklist();
    };


    /* ───────────────── Featured Image (upload) ───────────────── */
    window.previewImage = function (event) {
        const file = event.target.files?.[0];
        if (!file) return;

        const img = document.getElementById('imgPreview');
        const wrap = document.getElementById('imgPreviewWrap');
        const uploadZone = document.getElementById('uploadZone');
        const mediaIdInput = document.getElementById('featuredMediaId');
        const url = URL.createObjectURL(file);

        if (img) {
            img.src = url;
            img.onload = () => URL.revokeObjectURL(url);
        }
        if (wrap) wrap.classList.add('show');
        if (uploadZone) uploadZone.style.display = 'none';
        if (mediaIdInput) mediaIdInput.value = ''; // fresh upload — no media id yet, backend will assign one

        hasImage = true;
        updateSeo();
        updateChecklist();
    };

    window.clearImage = function () {
        const img = document.getElementById('imgPreview');
        const wrap = document.getElementById('imgPreviewWrap');
        const uploadZone = document.getElementById('uploadZone');
        const fileInput = uploadZone?.querySelector('input[type="file"]');
        const mediaIdInput = document.getElementById('featuredMediaId');

        if (img) img.src = '';
        if (wrap) wrap.classList.remove('show');
        if (uploadZone) uploadZone.style.display = '';
        if (fileInput) fileInput.value = ''; // reset so backend doesn't get a stale file
        if (mediaIdInput) mediaIdInput.value = '';

        hasImage = false;
        updateSeo();
        updateChecklist();
    };


    /* ───────────────── Featured Image: Media Library (dummy data) ───────────────── */
    const mediaLibraryItems = @json($mediaLibraryItemsForJs);

    let selectedLibraryId = null;

    function renderMediaGrid(items) {
        const grid = document.getElementById('mlGrid');
        if (!grid) return;
        grid.innerHTML = '';
        items.forEach(item => {
            const el = document.createElement('div');
            el.className = 'ml-item' + (selectedLibraryId === item.id ? ' selected' : '');
            el.dataset.id = item.id;
            el.addEventListener('click', () => selectLibraryItem(item.id));
            el.innerHTML = `
                <div class="ml-thumb">
                    <img src="${item.url}" alt="${item.filename}">
                    <div class="ml-check">✓</div>
                </div>
                <div class="ml-filename">${item.filename}</div>
            `;
            grid.appendChild(el);
        });
    }

    function selectLibraryItem(id) {
        selectedLibraryId = id;
        document.querySelectorAll('.ml-item').forEach(el => {
            el.classList.toggle('selected', parseInt(el.dataset.id) === id);
        });
        const selectBtn = document.getElementById('mlSelectBtn');
        if (selectBtn) selectBtn.disabled = false;
    }

    window.filterMediaGrid = function () {
        const q = document.getElementById('mlSearch')?.value.toLowerCase() || '';
        renderMediaGrid(mediaLibraryItems.filter(i => i.filename.toLowerCase().includes(q)));
    };

    window.openMediaLibrary = function () {
        selectedLibraryId = null;
        const search = document.getElementById('mlSearch');
        if (search) search.value = '';
        const selectBtn = document.getElementById('mlSelectBtn');
        if (selectBtn) selectBtn.disabled = true;
        renderMediaGrid(mediaLibraryItems);
        document.getElementById('mlOverlay')?.classList.add('open');
    };

    window.closeMediaLibrary = function () {
        document.getElementById('mlOverlay')?.classList.remove('open');
    };

    window.confirmMediaSelection = function () {
        const item = mediaLibraryItems.find(i => i.id === selectedLibraryId);
        if (!item) return;

        // Reuses the SAME preview area/behavior as manual upload (imgPreviewWrap)
        const img = document.getElementById('imgPreview');
        const wrap = document.getElementById('imgPreviewWrap');
        const uploadZone = document.getElementById('uploadZone');
        const mediaIdInput = document.getElementById('featuredMediaId');

        if (img) img.src = item.url;
        if (wrap) wrap.classList.add('show');
        if (uploadZone) uploadZone.style.display = 'none';
        if (mediaIdInput) mediaIdInput.value = item.id;

        const fileInput = document.querySelector('input[name="featured_image"]');

       if (fileInput) {
         fileInput.value = '';
       }

        hasImage = true;
        updateSeo();
        updateChecklist();
        closeMediaLibrary();
    };


    /* ───────────────── Gallery: Media Library (multi-select, reuses same dummy data) ───────────────── */
    let gallerySelectedIds = [];

    function renderGalleryMediaGrid(items) {
        const grid = document.getElementById('glMlGrid');
        if (!grid) return;
        grid.innerHTML = '';
        items.forEach(item => {
            const el = document.createElement('div');
            el.className = 'ml-item' + (gallerySelectedIds.includes(item.id) ? ' selected' : '');
            el.dataset.id = item.id;
            el.addEventListener('click', () => toggleGalleryLibraryItem(item.id));
            el.innerHTML = `
                <div class="ml-thumb">
                    <img src="${item.url}" alt="${item.filename}">
                    <div class="ml-check">✓</div>
                </div>
                <div class="ml-filename">${item.filename}</div>
            `;
            grid.appendChild(el);
        });
    }

    function toggleGalleryLibraryItem(id) {
        const idx = gallerySelectedIds.indexOf(id);
        if (idx === -1) gallerySelectedIds.push(id);
        else gallerySelectedIds.splice(idx, 1);

        document.querySelectorAll('#glMlGrid .ml-item').forEach(el => {
            el.classList.toggle('selected', gallerySelectedIds.includes(parseInt(el.dataset.id, 10)));
        });

        const countLabel = document.getElementById('glMlSelectedCount');
        if (countLabel) countLabel.textContent = `${gallerySelectedIds.length} selected`;

        const selectBtn = document.getElementById('glMlSelectBtn');
        if (selectBtn) selectBtn.disabled = gallerySelectedIds.length === 0;
    }

    window.filterGalleryMediaGrid = function () {
        const q = document.getElementById('glMlSearch')?.value.toLowerCase() || '';
        renderGalleryMediaGrid(mediaLibraryItems.filter(i => i.filename.toLowerCase().includes(q)));
    };

    window.openGalleryMediaLibrary = function () {
        gallerySelectedIds = [];
        const search = document.getElementById('glMlSearch');
        if (search) search.value = '';
        const selectBtn = document.getElementById('glMlSelectBtn');
        if (selectBtn) selectBtn.disabled = true;
        const countLabel = document.getElementById('glMlSelectedCount');
        if (countLabel) countLabel.textContent = '0 selected';
        renderGalleryMediaGrid(mediaLibraryItems);
        document.getElementById('glMlOverlay')?.classList.add('open');
    };

    window.closeGalleryMediaLibrary = function () {
        document.getElementById('glMlOverlay')?.classList.remove('open');
    };

    window.confirmGallerySelection = function () {
        const grid = document.getElementById('galleryGrid');
        if (!grid || gallerySelectedIds.length === 0) return;

        const selectedItems = mediaLibraryItems.filter(i => gallerySelectedIds.includes(i.id));

        selectedItems.forEach(item => {
          const alreadyExists = grid.querySelector(
        `input[value="${item.id}"]`
    );

    if (alreadyExists) {
        return;
    }
            const el = document.createElement('div');
            el.className = 'gallery-item';
            el.innerHTML = `
                <img src="${item.url}" alt="${item.filename}">
                <button type="button" class="gallery-item-remove">×</button>
                <input type="hidden" name="gallery_media_ids[]" value="${item.id}">
            `;
            // TODO (Laravel): backend should merge gallery_media_ids[] (library picks)
            // with gallery[] (fresh uploads) when saving the post's gallery relation.
            el.querySelector('.gallery-item-remove').addEventListener('click', () => el.remove());
            grid.insertBefore(el, grid.lastElementChild); // keep the "Add" tile last
        });

        closeGalleryMediaLibrary();
    };


    /* ───────────────── Gallery ───────────────── */
    window.addGalleryImages = function (event) {
        const files = Array.from(event.target.files || []);
        const grid = document.getElementById('galleryGrid');
        if (!grid) return;

        files.forEach(file => {
            const url = URL.createObjectURL(file);
            const item = document.createElement('div');
            item.className = 'gallery-item';
            item.innerHTML = `<img src="${url}" alt=""><button type="button" class="gallery-item-remove">×</button>`;
            item.querySelector('button').addEventListener('click', () => {
                item.remove();
                URL.revokeObjectURL(url);
            });
            grid.insertBefore(item, grid.lastElementChild);
        });
    };


    /* ───────────────── Video Upload ───────────────── */
    window.switchVideoTab = function (tab, btn) {
        document.querySelectorAll('.video-tab').forEach(t => t.classList.remove('active'));
        btn.classList.add('active');

        document.querySelectorAll('.video-panel').forEach(p => p.classList.remove('active'));
        document.getElementById('vp-' + tab)?.classList.add('active');
    };

    window.simulateUpload = function (event) {
        const file = event.target.files?.[0];
        if (!file) return;

        const wrap = document.getElementById('videoProgressWrap');
        const fill = document.getElementById('videoProgressFill');
        const label = document.getElementById('videoProgressLabel');

        if (wrap) wrap.classList.add('show');

        let pct = 0;
        const interval = setInterval(() => {
            pct += 10;
            if (fill) fill.style.width = pct + '%';
            if (label) label.textContent = pct < 100 ? `Uploading… ${pct}%` : 'Upload complete';
            if (pct >= 100) clearInterval(interval);
        }, 120);
    };


    /* ───────────────── Status (Draft/Published/Scheduled) ───────────────── */
    window.setStatus = function (btn, value) {
        document.querySelectorAll('.status-opt').forEach(el => el.classList.remove('active'));
        btn.classList.add('active');

        const statusInput = document.getElementById('statusInput');
        const scheduled = document.getElementById('scheduledField');
        if (statusInput) statusInput.value = value;
        if (scheduled) scheduled.style.display = value === 'scheduled' ? '' : 'none';
    };


    /* ───────────────── Save as Draft ───────────────── */
    window.saveDraft = function () {
        const statusInput = document.getElementById('statusInput');
        if (statusInput) statusInput.value = 'draft';

        if (editorInstance) editorInstance.updateSourceElement();

        const form = document.getElementById('blogForm');
        if (form) form.requestSubmit(); // submits to the SAME backend route, status = draft
    };


    /* ───────────────── SEO Score ───────────────── */
    function updateSeo() {
        const title = document.getElementById('title')?.value.length || 0;
        const desc = document.getElementById('meta_description')?.value.length
                  || document.getElementById('description')?.value.length || 0;

        const checks = {
            'seo-title-check': title >= 50 && title <= 60,
            'seo-desc-check': desc >= 120 && desc <= 160,
            'seo-img-check': hasImage,
            'seo-content-check': (editorInstance
                ? editorInstance.getData().replace(/<[^>]+>/g,' ').trim().split(/\s+/).filter(Boolean).length
                : 0) >= 300
        };

        let passed = 0;
        Object.entries(checks).forEach(([id, ok]) => {
            const el = document.getElementById(id);
            if (!el) return;
            el.classList.toggle('pass', ok);
            el.classList.toggle('fail', !ok);
            if (ok) passed++;
        });

        const score = Math.round((passed / Object.keys(checks).length) * 100);
        const scoreLabel = document.getElementById('seoScore');
        const circle = document.getElementById('seoCircle');
        if (scoreLabel) scoreLabel.textContent = score;
        if (circle) circle.style.strokeDashoffset = 125.6 - (125.6 * score / 100);
    }
    window.updateSeo = updateSeo;


    /* ───────────────── Pre-Publish Checklist ───────────────── */
    function updateChecklist() {
        const checks = {
            'check-title': !!document.getElementById('title')?.value.trim(),
            'check-desc': !!document.getElementById('description')?.value.trim(),
            'check-img': hasImage,
            'check-cat': !!document.getElementById('category')?.value,
            'check-content': (editorInstance
                ? editorInstance.getData().replace(/<[^>]+>/g,' ').trim().split(/\s+/).filter(Boolean).length
                : 0) > 0
        };

        Object.entries(checks).forEach(([id, ok]) => {
            const el = document.getElementById(id);
            if (!el) return;
            el.classList.toggle('pass', ok);
            el.classList.toggle('fail', !ok);
        });
    }
    window.updateChecklist = updateChecklist;

    // also recalc checklist when category changes
    document.getElementById('category')?.addEventListener('change', () => {
        updateSeo();
        updateChecklist();
    });

})();
</script>
@endsection