document.addEventListener('DOMContentLoaded', function() {
    const priceInputs = document.querySelectorAll('input[name="price"]');
    
    priceInputs.forEach(input => {
        input.addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^\d]/g, '');
            if (value === '') {
                e.target.value = '';
                return;
            }
            
            // Check if value exceeds 900,000
            if (parseInt(value) > 900000) {
                // Show warning
                let warningDiv = e.target.parentNode.querySelector('.price-warning');
                if (!warningDiv) {
                    warningDiv = document.createElement('div');
                    warningDiv.className = 'price-warning';
                    warningDiv.textContent = 'Pembayaran tidak bisa melebihi 900 ribu!';
                    e.target.parentNode.appendChild(warningDiv);
                }
                warningDiv.style.display = 'block';
                e.target.style.borderColor = '#ef4444';
            } else {
                // Hide warning
                let warningDiv = e.target.parentNode.querySelector('.price-warning');
                if (warningDiv) {
                    warningDiv.style.display = 'none';
                }
                e.target.style.borderColor = '';
            }
            
            // Add thousand separators
            let formatted = '';
            let count = 0;
            for (let i = value.length - 1; i >= 0; i--) {
                formatted = value[i] + formatted;
                count++;
                if (count === 3 && i !== 0) {
                    formatted = '.' + formatted;
                    count = 0;
                }
            }
            
            e.target.value = formatted;
        });
        
        // Store raw value for form submission
        input.addEventListener('blur', function(e) {
            const rawValue = e.target.value.replace(/[^\d]/g, '');
            e.target.setAttribute('data-raw-value', rawValue);
        });
    });
    
    // Handle form submission
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const priceInput = form.querySelector('input[name="price"]');
            if (priceInput) {
                const rawValue = priceInput.getAttribute('data-raw-value') || priceInput.value.replace(/[^\d]/g, '');
                
                // Prevent submission if exceeds 900,000
                if (parseInt(rawValue) > 900000) {
                    e.preventDefault();
                    alert('Pembayaran tidak bisa melebihi 900 ribu!');
                    return false;
                }
                
                priceInput.value = rawValue;
            }
        });
    });
});
