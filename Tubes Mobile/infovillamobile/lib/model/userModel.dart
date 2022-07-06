class User {
  int? id;
  String? name;
  String? username;
  String? image;
  String? email;
  String? asal;
  int? isAdmin;
  String? token;

  User(
      {this.id,
      this.name,
      this.username,
      this.image,
      this.email,
      this.asal,
      this.isAdmin,
      this.token});

  // function to convert json data to user model
  factory User.fromJson(Map<String, dynamic> json) {
    return User(
        id: json['user']['id'],
        name: json['user']['name'],
        username: json['user']['username'],
        image: json['user']['image'],
        email: json['user']['email'],
        asal: json['user']['asal'],
        isAdmin: json['user']['isAdmin'],
        token: json['token']);
  }
}
