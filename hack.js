var _ = require('lodash');
var fs = require('fs');
var books = require('./books');
var authors = require('./authors');
var books_authors = require('./books_authors');
var keywords = require('./keywords');
var books_keywords = require('./books_keywords');
var curriculum = require('./curriculum');
var books_curriculum = require('./books_curriculum');

var new_books = [];

console.log('processing all the book …', Date.now());

_.each(books, function (book, index, books) {
  var bookwords = _.filter(books_keywords, function(item) {
    return !_.isUndefined(item[book.id]);
  });
  var curry = _.filter(books_curriculum, function(item) {
    return !_.isUndefined(item[book.id]);
  });
  book.author = authors[books_authors[book.id]];
  book.keywords = [];
  book.curriculums = [];
  bookwords.forEach(function(obj) {
    book.keywords.push(keywords[obj[book.id]]);
  });
  curry.forEach(function(obj) {
    book.curriculums.push(curriculum[obj[book.id]]);
  });
  new_books.push(book);
});

console.log('book id 4 like this …', new_books[2]);

fs.writeFile('bbr.json', JSON.stringify(new_books, null, 2), function (err) {
  console.log('created bbr.json …', Date.now());
});