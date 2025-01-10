const openMdalButtons = document.querySelectorAll('.open');
const closeMdalButtons = document.querySelectorAll('.close');
const modals = document.querySelectorAll('.modal');

openMdalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modalId = button.getAttribute('data-modal');
        const modal = document.getElementById(modalId);
        if(modal) {
            modal.style.display = 'block';
        }
    });
});

closeMdalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modal = button.closest('.modal');
        if(modal) {
            modal.style.display = 'none';
        }
    });
});

modals.forEach(modal => {
    modal.addEventListener('click', event => {
        if(event.target === modal) {
            modal.style.display = 'none';
        }
    });
});