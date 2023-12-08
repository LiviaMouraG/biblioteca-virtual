function menuShow() {
    let menuMobile = document.querySelector('.mobile-menu');
    if (menuMobile.classList.contains('open')) {
        menuMobile.classList.remove('open');
        document.querySelector('.icon').src = "public/assets/menu_white_36dp.svg";
    } else {
        menuMobile.classList.add('open');
        document.querySelector('.icon').src = "public/assets/close_white_36dp.svg";
    }
}

// ICON INTERATIVO
function showUserInfo() {
    const userInfo = document.getElementById('user-info');
    
    // Verifique se o elemento está visível ou oculto
    if (userInfo.style.display === 'block') {
        // Se estiver visível, oculte-o
        userInfo.style.display = 'none';
    } else {
        // Se estiver oculto, mostre-o
        userInfo.style.display = 'block';
    }
}

function logout() {
    alert('Você foi desconectado.');
    window.location.href = "logout.php";
}


// PESQUISA
const suggestionToUrlMap = {
    "Futebol": "../esportes/futsal.php",
    "Voleibol": "../esportes/volei.php",
    "Queimada": "../esportes/queimada.php",
    "Xadrez": "../esportes/xadrez.php",
    "FIFA": "../esportes/fifa.php",
    "Interclasse": "../noticias/index.php",
    "Equipes": "../equipes/index.php",
};

const searchInput = document.getElementById('search-input');
const suggestionsList = document.getElementById('suggestions');

searchInput.addEventListener('input', function () {
    const inputValue = searchInput.value.toLowerCase();
    const filteredSuggestions = Object.keys(suggestionToUrlMap).filter(suggestion => suggestion.toLowerCase().includes(inputValue));

    displaySuggestions(filteredSuggestions);

    // Verifique se o valor do campo de entrada está vazio
    if (inputValue === '') {
        suggestionsList.style.display = 'none';
    }
});

function displaySuggestions(suggestionsArray) {
    suggestionsList.innerHTML = '';

    if (suggestionsArray.length === 0) {
        suggestionsList.style.display = 'none';
        return;
    }

    suggestionsArray.forEach(suggestion => {
        const listItem = document.createElement('li');
        listItem.textContent = suggestion;
        listItem.addEventListener('click', function () {
            redirectToPage(suggestion);
        });
        suggestionsList.appendChild(listItem);
    });

    suggestionsList.style.display = 'block';
}

function redirectToPage(query) {
    const url = suggestionToUrlMap[query];
    if (url) {
        window.location.href = url;
    } else {
        alert("URL não encontrada para esta sugestão.");
    }
}
