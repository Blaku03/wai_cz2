const menuContainer: HTMLElement = document.querySelector('.menu-container');

const dropMenuContainer: HTMLElement = document.createElement('li');
dropMenuContainer.classList.add('menu-js-drop');

const dropLinkName: HTMLAnchorElement = document.createElement('a');
dropLinkName.classList.add('menu-text-content');
dropLinkName.textContent = 'Przydatne linki ↓';
dropLinkName.href = '#';

dropMenuContainer.appendChild(dropLinkName);

const dropLinkContainer: HTMLElement = document.createElement('div');

dropLinkContainer.classList.add('drop-link-container');

const dropLinkList: HTMLUListElement = document.createElement('ul');

interface Links {
  name: string;
  website: string;
}

const dropLinkLinks: Links[] = [
  { name: 'Fide', website: 'https://fide.com/' },
  { name: 'Lichess', website: 'https://lichess.org/' },
  { name: 'Chess.com', website: 'https://chess.com/' },
];

dropLinkLinks.forEach(link => {
  const linkItem: HTMLElement = document.createElement('li');

  const linkItemContent: HTMLAnchorElement = document.createElement('a');

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

menuContainer.addEventListener('click', (e: MouseEvent) => {
  const menuLinkClicked = e.target as HTMLElement;

  if (menuLinkClicked.classList.contains('menu-text-content')) {
    const clicks: number = Number(localStorage.getItem('linksClicked')) || 0;
    localStorage.setItem('linksClicked', `${clicks + 1}`);
  }
});

const formSubmit: HTMLElement = document?.querySelector('input[type="submit"]');

if (formSubmit) {
  formSubmit.style.color = 'red';
}

formSubmit?.addEventListener('click', e => {
  const clicks: number = Number(sessionStorage.getItem('formsSubmitted')) || 0;
  sessionStorage.setItem('formsSubmitted', `${clicks + 1}`);
});
