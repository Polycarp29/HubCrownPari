window.addEventListener("show-toast", (event) => {
    const { message, type, description } = event.detail;

    if (type === "success") {
        toast.success(message, { description });
    } else if (type === "error") {
        toast.error(message, { description });
    } else {
        toast(message, { description });
    }
});