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

var App = React.createClass({
  getInitialState: function() {
    return {};
  },
  render: function () {
    var style = {};
    var book = this.props.book;
    return (
      <div className="container">
        <div className="row">
          <div className="col-md-3">
            <img src={'http://overnight-website.s3.amazonaws.com/wp-uploads'+ book.picture} />
            <a href="#">Google Book Preview</a>
          </div>
          <div className="col-md-6">
            <h1 className="post-title">{book.title}</h1>
            <div className="post-content">
              <strong>by {book.author}, Terry Widener (Illustrator)</strong>
              <h3>Overview</h3>
              <p>{book.description}</p>
            </div>
            <div className="spacer-20"></div>
            <table className="table table-striped">
              <tbody>
                <tr>
                  <td><strong>ISBN:</strong></td>
                  <td>{book.isbn || 'N/A'}</td>
                </tr>
                <tr>
                  <td><strong>Biography Person:</strong></td>
                  <td>{book.biography_person || 'N/A'}</td>
                </tr>
                <tr>
                  <td><strong>Page Count:</strong></td>
                  <td>{book.pages || 'N/A'}</td>
                </tr>
                <tr>
                  <td><strong>Age Group:</strong></td>
                  <td>{book.age_group || 'N/A'}</td>
                </tr>
                <tr>
                  <td><strong>Reading Level:</strong></td>
                  <td>{book.guided_reading_level || 'N/A'}</td>
                </tr>
                <tr>
                  <td><strong>Series:</strong></td>
                  <td>{book.series || 'N/A'}</td>
                </tr>
                <tr>
                  <td><strong>Publish Date:</strong></td>
                  <td>{book.publish_date || 'N/A'}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div className="col-md-3 sidebar right-sidebar">
            <div className="widget sidebar-widget widget_next_exhibitions box-style1">
              <button type="submit" className="btn btn-primary btn-lg">$ Purchase Book</button>
              <a href="#">Download PDF</a>
            </div>
          </div>
        </div>
      </div>
    );
  }
});

React.render(<App book={testBook.data} />, document.querySelector('#books'));