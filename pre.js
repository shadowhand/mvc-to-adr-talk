// headings trigger a new slide
// headings with a caret (e.g., '##^ foo`) trigger a new vertical slide
module.exports = (markdown, options) => {
    return markdown.split('\n').map((line, index) => {
        if (!/\/\//.test(line)) {
            return line;
        }
        return line.replace('//', '  ');
    }).join('\n');
};
