document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    document.getElementById('homeButton').addEventListener('click', function() {
        window.location.href = 'index.html'; // Вкажіть URL для вашої головної сторінки
    });
    
    document.getElementById('aboutButton').addEventListener('click', function() {
        window.location.href = 'index.html'; // Вкажіть URL
    });

    // Тут має бути логіка перевірки введених даних
    console.log(`Username: ${username}, Password: ${password}`);
    alert(`Ласкаво просимо, ${username}!`);
    
    
    
});
