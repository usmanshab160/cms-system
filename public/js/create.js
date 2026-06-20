<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

let editorInstance = null;
let galleryFiles = [];
let hasImage = false;
let tags = ['CMS'];

/* ── CKEditor init ── */
ClassicEditor
  .create(document.querySelector('#editor'), {
    toolbar: ['heading','|','bold','italic','underline','strikethrough','|','bulletedList','numberedList','|','link','blockQuote','insertTable','|','imageUpload','mediaEmbed','|','undo','redo']
  })
  .then(editor => {
    editorInstance = editor;
    editor.model.document.on('change:data', () => {
      const text = editor.getData().replace(/<[^>]+>/g,'');
      const words = text.trim() ? text.trim().split(/\s+/).length : 0;
      document.getElementById('wordCountBadge').textContent = words + ' word' + (words !== 1 ? 's' : '');
      const mins = Math.max(1, Math.ceil(words / 200));
      document.getElementById('readTimeCalc').textContent = '~' + mins + ' min read';
      document.getElementById('read_time').value = mins;
      updateSeo();
      updateChecklist();
    });
  })
  .catch(console.error);

/* ── Char counter ── */
function updateCharCount(inputId, counterId, max) {
  const v = document.getElementById(inputId).value.length;
  const el = document.getElementById(counterId);
  el.textContent = v + ' / ' + max;
  el.className = 'char-counter' + (v > max * 0.9 ? ' warn' : '') + (v >= max ? ' over' : '');
  if (inputId === 'title') autoSlug();
  updateSeo();
  updateChecklist();
}

/* ── Auto slug ── */
function autoSlug() {
  const t = document.getElementById('title').value;
  document.getElementById('slug').value = t.toLowerCase().replace(/[^a-z0-9\s-]/g,'').trim().replace(/\s+/g,'-');
}

/* ── Tags ── */
function handleTag(e) {
  if (e.key === 'Enter' || e.key === ',') {
    e.preventDefault();
    const v = e.target.value.trim().replace(',','');
    if (v && !tags.includes(v)) {
      tags.push(v);
      renderTags();
    }
    e.target.value = '';
  }
}
function removeTag(btn, tag) {
  tags = tags.filter(t => t !== tag);
  renderTags();
}
function renderTags() {
  const wrap = document.getElementById('tagsWrap');
  const inp = document.getElementById('tagInput');
  wrap.innerHTML = '';
  tags.forEach(t => {
    const chip = document.createElement('span');
    chip.className = 'tag-chip';
    chip.innerHTML = `${t} <button type="button" onclick="removeTag(this,'${t}')">×</button>`;
    wrap.appendChild(chip);
  });
  wrap.appendChild(inp);
  document.getElementById('tagsHidden').value = tags.join(',');
}

/* ── Image preview ── */
function previewImage(e) {
  const file = e.target.files[0];
  if (!file) return;
  const url = URL.createObjectURL(file);
  document.getElementById('imgPreview').src = url;
  document.getElementById('imgPreviewWrap').classList.add('show');
  document.getElementById('uploadZone').style.display = 'none';
  hasImage = true;
  updateSeo();
  updateChecklist();
}
function clearImage() {
  document.getElementById('imgPreviewWrap').classList.remove('show');
  document.getElementById('uploadZone').style.display = '';
  hasImage = false;
  updateSeo();
  updateChecklist();
}

/* ── Gallery ── */
function addGalleryImages(e) {
  const files = Array.from(e.target.files);
  const grid = document.getElementById('galleryGrid');
  files.forEach(file => {
    const url = URL.createObjectURL(file);
    const item = document.createElement('div');
    item.className = 'gallery-item';
    item.innerHTML = `<img src="${url}" alt=""/><button type="button" class="gallery-item-remove" onclick="this.parentElement.remove()"><svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>`;
    grid.insertBefore(item, grid.lastElementChild);
  });
}

/* ── Video tab ── */
function switchVideoTab(tab, btn) {
  document.querySelectorAll('.video-tab').forEach(b => b.classList.remove('active'));
  document.querySelectorAll('.video-panel').forEach(p => p.classList.remove('active'));
  btn.classList.add('active');
  document.getElementById('vp-' + tab).classList.add('active');
}

/* ── Fake upload progress ── */
function simulateUpload(e) {
  if (!e.target.files.length) return;
  const wrap = document.getElementById('videoProgressWrap');
  const fill = document.getElementById('videoProgressFill');
  const label = document.getElementById('videoProgressLabel');
  wrap.classList.add('show');
  let p = 0;
  const iv = setInterval(() => {
    p += Math.random() * 12;
    if (p >= 100) { p = 100; clearInterval(iv); label.textContent = 'Upload complete ✓'; }
    else label.textContent = 'Uploading… ' + Math.round(p) + '%';
    fill.style.width = p + '%';
  }, 180);
}

/* ── Status toggle ── */
function setStatus(btn, val) {
  document.querySelectorAll('.status-opt').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  document.getElementById('statusInput').value = val;
  document.getElementById('scheduledField').style.display = val === 'scheduled' ? '' : 'none';
}

/* ── SEO Score ── */
function updateSeo() {
  const title = document.getElementById('title').value;
  const desc = document.getElementById('description').value;
  const text = editorInstance ? editorInstance.getData().replace(/<[^>]+>/g,'') : '';
  const words = text.trim() ? text.trim().split(/\s+/).length : 0;

  const checks = {
    'seo-title-check': title.length >= 50 && title.length <= 60,
    'seo-desc-check': desc.length >= 120 && desc.length <= 160,
    'seo-img-check': hasImage,
    'seo-content-check': words >= 300
  };
  let score = 0;
  Object.entries(checks).forEach(([id, pass]) => {
    score += pass ? 25 : 0;
    const el = document.getElementById(id);
    if (!el) return;
    el.className = 'seo-check ' + (pass ? 'pass' : 'fail');
    el.innerHTML = `<svg viewBox="0 0 24 24">${pass ? '<polyline points="20 6 9 17 4 12"/>' : '<line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>'}</svg> ${el.textContent.trim()}`;
  });
  document.getElementById('seoScore').textContent = score;
  const circ = document.getElementById('seoCircle');
  const circumference = 2 * Math.PI * 20;
  circ.style.strokeDashoffset = circumference - (score / 100) * circumference;
  const color = score < 50 ? '#ef4444' : score < 75 ? '#f97316' : '#10b981';
  circ.style.stroke = color;
  document.getElementById('seoScore').style.color = color;
}

/* ── Checklist ── */
function updateChecklist() {
  const title = document.getElementById('title').value.trim();
  const desc = document.getElementById('description').value.trim();
  const cat = document.getElementById('category').value;
  const text = editorInstance ? editorInstance.getData().replace(/<[^>]+>/g,'') : '';
  const words = text.trim() ? text.trim().split(/\s+/).length : 0;

  setCheck('check-title', !!title);
  setCheck('check-desc', !!desc);
  setCheck('check-img', hasImage);
  setCheck('check-cat', !!cat);
  setCheck('check-content', words > 0);
}
function setCheck(id, pass) {
  const el = document.getElementById(id);
  if (!el) return;
  const label = el.textContent.trim();
  el.className = 'seo-check ' + (pass ? 'pass' : 'fail');
  el.innerHTML = `<svg viewBox="0 0 24 24">${pass ? '<polyline points="20 6 9 17 4 12"/>' : '<line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>'}</svg> ${label}`;
}

/* ── Category change ── */
document.getElementById('category').addEventListener('change', updateChecklist);

/* ── Save draft ── */
function saveDraft() {
  const now = new Date();
  document.getElementById('lastSaved').textContent = now.toLocaleTimeString([], {hour:'2-digit',minute:'2-digit'});
  showToast('Draft saved at ' + now.toLocaleTimeString([], {hour:'2-digit',minute:'2-digit'}));
}

/* ── Toast ── */
function showToast(msg) {
  const t = document.getElementById('toast');
  document.getElementById('toastMsg').textContent = msg;
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 3000);
}

/* ── Auto-save every 2 min ── */
setInterval(saveDraft, 120000);

/* ── Drag-and-drop highlight ── */
['dragover','dragleave','drop'].forEach(ev => {
  document.getElementById('uploadZone').addEventListener(ev, e => {
    e.preventDefault();
    document.getElementById('uploadZone').classList.toggle('drag', ev === 'dragover');
    if (ev === 'drop' && e.dataTransfer.files[0]) {
      previewImage({ target: { files: e.dataTransfer.files } });
    }
  });
  document.getElementById('videoUploadZone').addEventListener(ev, e => {
    e.preventDefault();
    document.getElementById('videoUploadZone').classList.toggle('drag', ev === 'dragover');
  });
});

/* Init SEO ring */
document.getElementById('seoCircle').style.strokeDasharray = (2 * Math.PI * 20).toFixed(1);
document.getElementById('seoCircle').style.strokeDashoffset = (2 * Math.PI * 20).toFixed(1);

ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });
