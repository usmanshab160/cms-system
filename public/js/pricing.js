
    // Billing toggle
    const toggle = document.getElementById('billingToggle');
    const proVal = document.querySelector('.plan-card.popular .price-val');
    const proOriginal = document.getElementById('pro-original');
    const proBilling = document.getElementById('pro-billing');
    const proSave = document.getElementById('pro-save');

    toggle.addEventListener('change', () => {
      if (toggle.checked) {
        proVal.textContent = '23';
        proOriginal.textContent = '$29';
        proOriginal.style.display = 'inline';
        proBilling.textContent = 'billed annually';
        proSave.style.display = 'block';
      } else {
        proVal.textContent = '29';
        proOriginal.style.display = 'none';
        proBilling.textContent = 'billed monthly';
        proSave.style.display = 'none';
      }
    });

    // FAQ accordion
    document.querySelectorAll('.faq-q').forEach(btn => {
      btn.addEventListener('click', () => {
        const item = btn.closest('.faq-item');
        const isOpen = item.classList.contains('open');
        document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
        if (!isOpen) item.classList.add('open');
      });
    });
