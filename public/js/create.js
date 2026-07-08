(() => {

    let editorInstance = null;
    let galleryFiles = [];
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
    const mediaLibraryItems = [
        { id: 1, url: 'https://picsum.photos/seed/cms1/300/300', filename: 'hero-banner.jpg' },
        { id: 2, url: 'https://picsum.photos/seed/cms2/300/300', filename: 'team-photo.png' },
        { id: 3, url: 'https://picsum.photos/seed/cms3/300/300', filename: 'blog-cover-ai.jpg' },
        { id: 4, url: 'https://picsum.photos/seed/cms4/300/300', filename: 'product-shot.webp' },
        { id: 5, url: 'https://picsum.photos/seed/cms5/300/300', filename: 'office-space.jpg' },
        { id: 6, url: 'https://picsum.photos/seed/cms6/300/300', filename: 'conference-2025.png' },
        { id: 7, url: 'https://picsum.photos/seed/cms7/300/300', filename: 'writer-desk.jpg' },
        { id: 8, url: 'https://picsum.photos/seed/cms8/300/300', filename: 'laptop-code.jpg' },
    ];
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