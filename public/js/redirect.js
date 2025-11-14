document.addEventListener('livewire:init', () => {
    Livewire.on('redirect', () => {
        setTimeout(() => {
            window.location.href="/onboarding";
        }, 3000) // redirect to onboarding page
    })
})