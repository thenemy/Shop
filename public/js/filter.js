// There will be all filters that possible for inputs
// Namely formatters of text
function removeSpace(value) {
    return value.replace(/\s+/g, '');
}

function formatCardNumber(event) {
    // we could remove space after condition because checking happens against current character inserted
    // event.target.value = "";
    const v = removeSpace(event.target.value).replace(/[^0-9]/gi, ''); // remove space and letters
    const matches = v.match(/\d{4,16}/g); // gives range
    const match = matches && matches[0] || ''; // choose only first items in array
    // item in array must have minimum four items because of regexp
    const parts = [];
    for (let i = 0, len = match.length; i < len; i += 4) {
        parts.push(match.substring(i, i + 4))
    }
    // if there is nothing initial value would be returned
    if (parts.length) {
        event.target.value = parts.join(' ')
    } else {
        onlyNumbers(event);
    }
}


function formatDateForCard(event) {
    if (onlyNumbers(event)) {
        const v = removeSpace(event.target.value).replace(/[^0-9]/gi, '');
        event.target.value = v.match(/\d{1,2}/g).slice(0, 2).join('/');
        return true;
    }
}

function onlyNumbers(event) {
    event.target.value = removeSpace(event.target.value).replace(/[^0-9]/gi, '');
}
