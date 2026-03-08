import fs from 'fs';
import https from 'https';

https.get('https://demo.sitesch.id/', (res) => {
    let data = '';
    res.on('data', (chunk) => data += chunk);
    res.on('end', () => {
        fs.writeFileSync('ref.html', data);
        console.log('HTML saved to ref.html');
    });
}).on('error', (err) => {
    console.error('Error fetching HTML: ', err.message);
});
