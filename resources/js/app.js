import './bootstrap';

const title = document.createElement('h1');
title.textContent = 'Evening Immanuel';

title.style.background = 'green'
title.style.color = 'white'
title.style.padding = '20px'
title.style.textAlign = 'center'


title.addEventListener('click', () => {
  title.style.background = 'yellow';
  title.style.color = 'black';
});
document.body.appendChild(title);


const diva = document.createElement('div');

diva.style.background = 'red';
diva.style.padding = '10px';
diva.style.margin = '10px';
diva.style.borderRadius = '5px';
diva.style.width = '50%';
diva.style.height = '50px';
diva.style.perspective = '510px';
document.body.appendChild(diva);