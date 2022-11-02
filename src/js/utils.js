/* truncate large description into excerpt */
export const truncWord = (str, limit) => {
    str = str.split(' ');//words must be seperated by space
    // chars counter
    let summ = 0;
    for (let [index, value]  of str.entries()) {
        //calculate length of each word
        summ  += value.length
        // truncate if chars limit is hit
        if (summ > limit) {
            // return truncated text
            return str.slice(0, index).join(' ') + ' ' + '...';
        }
    }
    return str.join(' ');//return untouched str
}