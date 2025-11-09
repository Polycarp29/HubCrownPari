document.addEventListener('livewire:init', () => {
    Livewire.on('redirect', () => {
        setTimeout(() => {
            window.location.href="/account.type";
        }, 3000) // redirect to onboarding page
    })
})