document.getElementById('adminButton').addEventListener('click', function() {
    var modal = document.getElementById('adminModal');
    modal.style.display = 'block';

    document.getElementById('closeBtn').addEventListener('click', function() {
        modal.style.display = 'none';
    });

    document.getElementById('understoodBtn').addEventListener('click', function() {
        modal.style.display = 'none';
    });
});