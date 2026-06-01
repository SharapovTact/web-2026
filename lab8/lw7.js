const minLength = 4;
const uppercaseLetters = [
    'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
    'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
];
const lowercaseLetters = [
    'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
    'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
];
const specialCharacters = [
    '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '=',
    '+', '[', ']', '{', '}', '\\', '|', ';', ':', "'", '"', ',', '.',
    '<', '>', '/', '?', '`', '~'
];
const digits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
function getRandomChar(array) {
    return array[Math.floor(Math.random() * array.length)];
}
function shuffleStr(arr) {
    for (let i = arr.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        let temp = arr[i];
        arr[i] = arr[j];
        arr[j] = temp;
    }
    return arr.join('');
}
function genPassword(len) {
    if (len < minLength) {
        console.error(`пароль минимум ${minLength} символа`);
        return -1;
    }
    let passwordArr = [];
    for (let i = 0; i < len; i++) {
        let order = (i + 1) % 4;
        switch (order) {
            case 0:
                passwordArr[i] = getRandomChar(uppercaseLetters);
                break;
            case 1:
                passwordArr[i] = getRandomChar(lowercaseLetters);
                break;
            case 2:
                passwordArr[i] = getRandomChar(specialCharacters);
                break;
            case 3:
                passwordArr[i] = getRandomChar(digits);
                break;
        }
    }
    return shuffleStr(passwordArr);
}