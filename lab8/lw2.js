function countVowels(str) {
    if (typeof str == 'string') {
        let vowels = ['а', 'е', 'ё', 'и', 'о', 'у', 'ы', 'э', 'ю', 'я'];
        let count = 0;
        for (let i = 0; i < str.length; i++) {
            for (let j = 0; j < vowels.length; j++) {
                if (vowels[j] === str[i]) {
                    count += 1;
                    break;
                }
            }
        }
        console.log(count + ' - vowels');
    }
    else {
        console.error('It isnt string');
    }
}