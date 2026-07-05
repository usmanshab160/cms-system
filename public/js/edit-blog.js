// ⛔ YEH LINE FILE KE SHURU SE DELETE KARO (yeh .js file mein invalid hai):
// <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

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


    /* ───────────────── Featured Image ───────────────── */
    window.previewImage = function (event) {
        const file = event.target.files?.[0];
        if (!file) return;

        const img = document.getElementById('imgPreview');
        const wrap = document.getElementById('imgPreviewWrap');
        const uploadZone = document.getElementById('uploadZone');
        const url = URL.createObjectURL(file);

        if (img) {
            img.src = url;
            img.onload = () => URL.revokeObjectURL(url);
        }
        if (wrap) wrap.classList.add('show');
        if (uploadZone) uploadZone.style.display = 'none';

        hasImage = true;
        updateSeo();
        updateChecklist();
    };

    window.clearImage = function () {
        const img = document.getElementById('imgPreview');
        const wrap = document.getElementById('imgPreviewWrap');
        const uploadZone = document.getElementById('uploadZone');
        const fileInput = uploadZone?.querySelector('input[type="file"]');

        if (img) img.src = '';
        if (wrap) wrap.classList.remove('show');
        if (uploadZone) uploadZone.style.display = '';
        if (fileInput) fileInput.value = ''; // reset so backend doesn't get a stale file

        hasImage = false;
        updateSeo();
        updateChecklist();
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
    // window.setStatus = function (btn, value) {
    //     document.querySelectorAll('.status-opt').forEach(el => el.classList.remove('active'));
    //     btn.classList.add('active');

    //     const statusInput = document.getElementById('statusInput');
    //     const scheduled = document.getElementById('scheduledField');
    //     if (statusInput) statusInput.value = value;
    //     if (scheduled) scheduled.style.display = value === 'scheduled' ? '' : 'none';
    // };

window.setStatus = function (btn, value) {

    document.querySelectorAll('.status-opt').forEach(el => {
        el.classList.remove('active');
    });

    btn.classList.add('active');

    document.getElementById('statusInput').value = value;

    document.getElementById('scheduledField').style.display =
        value === 'scheduled' ? 'block' : 'none';
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

// Set status when edit page loads
document.addEventListener("DOMContentLoaded", function () {

    const status = document.getElementById("statusInput").value;

    const draftBtn = document.getElementById("draftBtn");
    const publishedBtn = document.getElementById("publishedBtn");
    const scheduledBtn = document.getElementById("scheduledBtn");

    if (status === "Draft") {
        setStatus(draftBtn, "Draft");
    } else if (status === "Published") {
        setStatus(publishedBtn, "Published");
    } else if (status === "Scheduled") {
        setStatus(scheduledBtn, "Scheduled");
    }

});

})();