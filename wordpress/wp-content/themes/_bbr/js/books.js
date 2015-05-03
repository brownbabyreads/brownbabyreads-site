var testData = {
  "data": [
    {
      "age_group": "3rd to 5th",
      "bbr_estore_link": "",
      "biography_person": "",
      "booklists": "",
      "date_entered": "None",
      "description": "In 1921, thirteen-year-old Celeste leaves North Carolina to stay with her glamorous Aunt Valentina in Harlem, New York, where she discovers the vibrant Harlem Renaissance in full swing, even though her aunt's life is not exactly what she was led to believe. From Youngmindslibrary",
      "dra": "",
      "google_book_preview": "",
      "guided_reading_level": "X",
      "id": 1,
      "illustrator": "",
      "interest_level": "",
      "lexile": "780",
      "out_of_print": false,
      "pages": "288",
      "parent_publisher": "Hatchette Books",
      "picture": "/CelestesHarlemRenaissance.jpg",
      "publish_date": "None",
      "publisher": "Little, Brown Young Readers",
      "reading_grade_level": "",
      "reading_room": true,
      "series": "",
      "title": "Celeste's Harlem Renaissance",
      "type": "realistic fiction"
    },
    {
      "age_group": "3rd to 5th",
      "bbr_estore_link": "",
      "biography_person": "",
      "booklists": "",
      "date_entered": "None",
      "description": "In 1921, thirteen-year-old Celeste leaves North Carolina to stay with her glamorous Aunt Valentina in Harlem, New York, where she discovers the vibrant Harlem Renaissance in full swing, even though her aunt's life is not exactly what she was led to believe. From Youngmindslibrary",
      "dra": "",
      "google_book_preview": "",
      "guided_reading_level": "X",
      "id": 1,
      "illustrator": "",
      "interest_level": "",
      "lexile": "780",
      "out_of_print": false,
      "pages": "288",
      "parent_publisher": "Hatchette Books",
      "picture": "/CelestesHarlemRenaissance.jpg",
      "publish_date": "None",
      "publisher": "Little, Brown Young Readers",
      "reading_grade_level": "",
      "reading_room": true,
      "series": "",
      "title": "Celeste's Harlem Renaissance",
      "type": "realistic fiction"
    },
    {
      "age_group": "3rd to 5th",
      "bbr_estore_link": "",
      "biography_person": "",
      "booklists": "",
      "date_entered": "None",
      "description": "In 1921, thirteen-year-old Celeste leaves North Carolina to stay with her glamorous Aunt Valentina in Harlem, New York, where she discovers the vibrant Harlem Renaissance in full swing, even though her aunt's life is not exactly what she was led to believe. From Youngmindslibrary",
      "dra": "",
      "google_book_preview": "",
      "guided_reading_level": "X",
      "id": 1,
      "illustrator": "",
      "interest_level": "",
      "lexile": "780",
      "out_of_print": false,
      "pages": "288",
      "parent_publisher": "Hatchette Books",
      "picture": "/CelestesHarlemRenaissance.jpg",
      "publish_date": "None",
      "publisher": "Little, Brown Young Readers",
      "reading_grade_level": "",
      "reading_room": true,
      "series": "",
      "title": "Celeste's Harlem Renaissance",
      "type": "realistic fiction"
    },
    {
      "age_group": "3rd to 5th",
      "bbr_estore_link": "",
      "biography_person": "",
      "booklists": "",
      "date_entered": "None",
      "description": "In 1921, thirteen-year-old Celeste leaves North Carolina to stay with her glamorous Aunt Valentina in Harlem, New York, where she discovers the vibrant Harlem Renaissance in full swing, even though her aunt's life is not exactly what she was led to believe. From Youngmindslibrary",
      "dra": "",
      "google_book_preview": "",
      "guided_reading_level": "X",
      "id": 1,
      "illustrator": "",
      "interest_level": "",
      "lexile": "780",
      "out_of_print": false,
      "pages": "288",
      "parent_publisher": "Hatchette Books",
      "picture": "/CelestesHarlemRenaissance.jpg",
      "publish_date": "None",
      "publisher": "Little, Brown Young Readers",
      "reading_grade_level": "",
      "reading_room": true,
      "series": "",
      "title": "Celeste's Harlem Renaissance",
      "type": "realistic fiction"
    }
  ]
};

var BBR = React.createClass({displayName: "BBR",
  getInitialState: function () {
    return {
      books: null,
      book: null,
      offset: 1
    };
  },
  componentDidMount: function () {
    var self = this;
    var local = JSON.parse(localStorage.getItem('bbr_books'));
    if (local) {
      self.setState({books: local.data});
    } else {
      $.ajax({
        url: 'https://tranquil-sands-8572.herokuapp.com/books?page=0',
        jsonp: 'callback',
        dataType: 'jsonp',
        success: function (data, textStatus) {
          console.log(data);
          if (textStatus === 'success') {
            self.setState({books: data.data});
            localStorage.setItem('bbr_books', JSON.stringify(data));
          } else {
            self.setState({books: false});
          }
        }
      });
    }
  },
  render: function () {
    var style = {};
    var book = this.state.book;
    var books = this.state.books;
    if (book) return React.createElement(Book, {up: this, book: book});
    if (books === null) {
      return React.createElement("h1", null, "Loading books…");
    } else {
      return React.createElement(Books, {up: this, books: books});
    }
  }
});

var Books = React.createClass({displayName: "Books",
  _openBook: function (book) {
    this.props.up.setState({book: book});
  },
  render: function () {
    var self = this;
    var style = {
      book: { cursor: 'pointer' },
      image: {
        width: '100%',
        height: 240
      },
      title: {
        height: 81,
        overflow: 'hidden'
      }
    };
    return (
      React.createElement("div", {className: "container"}, 
        React.createElement("div", {className: "row"}, 
          React.createElement("div", {className: "col-md-3 sidebar right-sidebar"}, 
            React.createElement("div", {className: "widget sidebar-widget box-style1"}, 
              React.createElement("h3", {className: "widget-title"}, "Top categories"), 
              React.createElement("ul", {className: "top-categories-list"}
              )
            ), 
            React.createElement("div", {className: "widget sidebar-widget box-style1"}, 
              React.createElement("h3", {className: "widget-title"}, "Categories"), 
              React.createElement("ul", {className: "categories-list"}

              )
            )
          ), 
          React.createElement("div", {className: "col-md-9"}, 
            React.createElement("ul", {className: "sort-destination isotope exhibitions-grid", "data-sort-id": "grid"}, 
              this.props.books.map(function (book, index) {
                return (
                  React.createElement("li", {className: "col-md-4 col-sm-4 grid-item format-standard accrue-homestead", key: index, onClick: self._openBook.bind(null, book), style: style.book}, 
                    React.createElement("div", {style: _.extend({background: 'url(http://overnight-website.s3.amazonaws.com/wp-uploads'+ book.picture +') center / cover'}, style.image)}), 
                    React.createElement("div", {className: "grid-item-content"}, 
                      React.createElement("h3", {style: style.title}, book.title), 
                      React.createElement("div", {className: "meta-data grid-item-meta"}, React.createElement("i", {className: "fa fa-clock-o"}), " Available at Overload"), 
                      React.createElement("div", {className: "post-actions"}, 
                        React.createElement("button", {className: "btn btn-default"}, "Learn more")
                      )
                    )
                  )
                );
              })
            )
          )
        ), 
        React.createElement("div", {className: "row"}, 
          React.createElement("div", {className: "col-sm-9 col-sm-offset-3"}, 
            React.createElement("ul", {className: "pagination"}
            )
          )
        )
      )
    );
  }
});

var Book = React.createClass({displayName: "Book",
  _back: function () {
    this.props.up.setState({book: null});
  },
  render: function () {
    var book = this.props.book;
    var store_link = book.bbr_estore_link;
    var google_preview = book.google_book_preview;
    return (
      React.createElement("div", {className: "container"}, 
        React.createElement("div", {className: "row"}, 
          React.createElement("div", {className: "col-md-3"}, 
            React.createElement("button", {className: "btn btn-default", onClick: this._back}, "Back to Browse Books"), 
            React.createElement("div", {className: "spacer-20"}), 
            React.createElement("img", {src: 'http://overnight-website.s3.amazonaws.com/wp-uploads'+ book.picture}), 
            React.createElement("div", {className: "spacer-20"}), 
            React.createElement("p", null, google_preview && React.createElement("a", {href: google_preview}, "Google Book Preview"))
          ), 
          React.createElement("div", {className: "col-md-6"}, 
            React.createElement("h1", {className: "post-title"}, book.title), 
            React.createElement("div", {className: "post-content"}, 
              React.createElement("strong", null, "by ", book.author, ", Terry Widener (Illustrator)"), 
              React.createElement("h3", null, "Overview"), 
              React.createElement("p", null, book.description)
            ), 
            React.createElement("div", {className: "spacer-20"}), 
            React.createElement("table", {className: "table table-striped"}, 
              React.createElement("tbody", null, 
                React.createElement("tr", null, 
                  React.createElement("td", null, React.createElement("strong", null, "ISBN:")), 
                  React.createElement("td", null, book.isbn || 'N/A')
                ), 
                React.createElement("tr", null, 
                  React.createElement("td", null, React.createElement("strong", null, "Biography Person:")), 
                  React.createElement("td", null, book.biography_person || 'N/A')
                ), 
                React.createElement("tr", null, 
                  React.createElement("td", null, React.createElement("strong", null, "Page Count:")), 
                  React.createElement("td", null, book.pages || 'N/A')
                ), 
                React.createElement("tr", null, 
                  React.createElement("td", null, React.createElement("strong", null, "Age Group:")), 
                  React.createElement("td", null, book.age_group || 'N/A')
                ), 
                React.createElement("tr", null, 
                  React.createElement("td", null, React.createElement("strong", null, "Reading Level:")), 
                  React.createElement("td", null, book.guided_reading_level || 'N/A')
                ), 
                React.createElement("tr", null, 
                  React.createElement("td", null, React.createElement("strong", null, "Series:")), 
                  React.createElement("td", null, book.series || 'N/A')
                ), 
                React.createElement("tr", null, 
                  React.createElement("td", null, React.createElement("strong", null, "Publish Date:")), 
                  React.createElement("td", null, book.publish_date || 'N/A')
                )
              )
            )
          ), 
          React.createElement("div", {className: "col-md-3 sidebar right-sidebar"}, 
            store_link && (React.createElement("div", {className: "widget sidebar-widget widget_next_exhibitions box-style1"}, 
              React.createElement("a", {className: "btn btn-primary btn-lg", href: store_link}, "$ Purchase Book")
            ))
          )
        )
      )
    );
  }
});

React.render(React.createElement(BBR, null), document.querySelector('#books'));