var testBook = {
  "data": {
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
};

var App = React.createClass({displayName: "App",
  getInitialState: function() {
    return {};
  },
  render: function () {
    var style = {};
    var book = this.props.book;
    return (
      React.createElement("div", {className: "container"}, 
        React.createElement("div", {className: "row"}, 
          React.createElement("div", {className: "col-md-3"}, 
            React.createElement("img", {src: 'http://overnight-website.s3.amazonaws.com/wp-uploads'+ book.picture}), 
            React.createElement("a", {href: "#"}, "Google Book Preview")
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
            React.createElement("div", {className: "widget sidebar-widget widget_next_exhibitions box-style1"}, 
              React.createElement("button", {type: "submit", className: "btn btn-primary btn-lg"}, "$ Purchase Book"), 
              React.createElement("a", {href: "#"}, "Download PDF")
            )
          )
        )
      )
    );
  }
});

React.render(React.createElement(App, {book: testBook.data}), document.querySelector('#books'));