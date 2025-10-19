window.addEventListener('toast', event => {
    const {
        message,
        type
    } = event.detail;

    Toastify({
        text: message,
        duration: 4000,
        gravity: "top",
        position: "right",
        backgroundColor: type === 'success' ? "#22c55e" : "#ef4444", // green or red
        stopOnFocus: true,
    }).showToast();
});