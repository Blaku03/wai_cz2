const menuContainer = document.querySelector('.menu-container');
const dropMenuContainer = document.createElement('li');
dropMenuContainer.classList.add('menu-js-drop');
const dropLinkName = document.createElement('a');
dropLinkName.classList.add('menu-text-content');
dropLinkName.textContent = 'Przydatne linki ↓';
dropLinkName.href = '#';
dropMenuContainer.appendChild(dropLinkName);
const dropLinkContainer = document.createElement('div');
dropLinkContainer.classList.add('drop-link-container');
const dropLinkList = document.createElement('ul');
const dropLinkLinks = [
    { name: 'Fide', website: 'https://fide.com/' },
    { name: 'Lichess', website: 'https://lichess.org/' },
    { name: 'Chess.com', website: 'https://chess.com/' },
];
dropLinkLinks.forEach(link => {
    const linkItem = document.createElement('li');
    const linkItemContent = document.createElement('a');
    linkItemContent.href = link.website;
    linkItemContent.textContent = link.name;
    linkItemContent.target = '_blank';
    linkItem.appendChild(linkItemContent);
    dropLinkList.appendChild(linkItem);
});
dropLinkContainer.appendChild(dropLinkList);
dropMenuContainer.appendChild(dropLinkContainer);
menuContainer.appendChild(dropMenuContainer);
dropMenuContainer.addEventListener('click', e => {
    dropLinkContainer.classList.toggle('drop-link-container-active');
});
menuContainer.addEventListener('click', (e) => {
    const menuLinkClicked = e.target;
    if (menuLinkClicked.classList.contains('menu-text-content')) {
        const clicks = Number(localStorage.getItem('linksClicked')) || 0;
        localStorage.setItem('linksClicked', `${clicks + 1}`);
    }
});
const formSubmit = document === null || document === void 0 ? void 0 : document.querySelector('input[type="submit"]');
if (formSubmit) {
    formSubmit.style.color = 'red';
}
formSubmit === null || formSubmit === void 0 ? void 0 : formSubmit.addEventListener('click', e => {
    const clicks = Number(sessionStorage.getItem('formsSubmitted')) || 0;
    sessionStorage.setItem('formsSubmitted', `${clicks + 1}`);
});
