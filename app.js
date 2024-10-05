document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-book');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const bookId = this.dataset.id;

            if (confirm('Are you sure you want to delete this book?')) {
                window.location.href = `deleteBook.php?id=${bookId}`;
            }
        });
    });
});
