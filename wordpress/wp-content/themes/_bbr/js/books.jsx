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

var BBR = React.createClass({
  getInitialState: function () {
    return {
      books: null,
      book: null,
      offset: 1
    };
  },
  componentDidMount: function () {
    var self = this;
    $.ajax({
      url: 'https://tranquil-sands-8572.herokuapp.com/books?page=0',
      jsonp: 'callback',
      dataType: 'jsonp',
      success: function (data, textStatus) {
        console.log(data);
        if (textStatus === 'success') {
          self.setState({books: data.data});
        } else {
          self.setState({books: false});
        }
      }
    });
  },
  render: function () {
    var style = {};
    var book = this.state.book;
    var books = this.state.books;
    if (book) return <Book up={this} book={book} />;
    if (books === null) {
      return <h1>Loading books…</h1>;
    } else {
      return <Books up={this} books={books} />;
    }
  }
});

var Books = React.createClass({
  _openBook: function (book) {
    this.props.up.setState({book: book});
  },
  render: function () {
    var self = this;
    var style = {
      book: { cursor: 'pointer' },
      image: {
        width: '100%',
        height: '240px'
      }
    };
    return (
      <div className="container">
        <div className="row">
          <div className="col-md-3 sidebar right-sidebar">
            <div className="widget sidebar-widget box-style1">
              <h3 className="widget-title">Top categories</h3>
              <ul className="top-categories-list">
              </ul>
            </div>
            <div className="widget sidebar-widget box-style1">
              <h3 className="widget-title">Categories</h3>
              <ul className="categories-list">

              </ul>
            </div>
          </div>
          <div className="col-md-9">
            <ul className="sort-destination isotope exhibitions-grid" data-sort-id="grid">
              {this.props.books.map(function (book, index) {
                return (
                  <li className="col-md-4 col-sm-4 grid-item format-standard accrue-homestead" key={index} onClick={self._openBook.bind(null, book)} style={style.book}>
                    <div style={_.extend({background: 'url(http://overnight-website.s3.amazonaws.com/wp-uploads'+ book.picture +') center / cover'}, style.image)} />
                    <div className="grid-item-content">
                      <h3>{book.title}</h3>
                      <div className="meta-data grid-item-meta"><i className="fa fa-clock-o"></i> Available at Overload</div>
                      <div className="post-actions">
                        <button className="btn btn-default">Learn more</button>
                      </div>
                    </div>
                  </li>
                );
              })}
            </ul>
          </div>
        </div>
        <div className="row">
          <div className="col-sm-9 col-sm-offset-3">
            <ul className="pagination">
            </ul>
          </div>
        </div>
      </div>
    );
  }
});

var Book = React.createClass({
  _back: function () {
    this.props.up.setState({book: null});
  },
  render: function () {
    var book = this.props.book;
    return (
      <div className="container">
        <div className="row">
          <div className="col-md-3">
            <button className="btn btn-default" onClick={this._back}>Back to Browse Books</button>
            <div className="spacer-20" />
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

React.render(<BBR />, document.querySelector('#books'));