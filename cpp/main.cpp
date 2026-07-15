#include <iostream>
#include <string>
#include <vector>
#include <memory>

using namespace std;

// Abstract Base Class (Abstraction)
class Employee {
protected:
    string name; // Encapsulation
    int id;

public:
    Employee(string n, int i) : name(n), id(i) {}
    virtual ~Employee() = default;

    // Pure virtual function (Polymorphism)
    virtual void work() const = 0;

    void display() const {
        cout << "ID: " << id << " | Name: " << name << endl;
    }
};

// Derived Class 1 (Inheritance)
class Developer : public Employee {
private:
    string techStack;

public:
    Developer(string n, int i, string tech) : Employee(n, i), techStack(tech) {}

    void work() const override {
        cout << name << " is coding using " << techStack << "." << endl;
    }
};

// Derived Class 2 (Inheritance)
class Manager : public Employee {
private:
    int teamSize;

public:
    Manager(string n, int i, int size) : Employee(n, i), teamSize(size) {}

    void work() const override {
        cout << name << " is managing a team of " << teamSize << " people." << endl;
    }
};

int main() {
    cout << "=== C++ OOP Showcase ===" << endl;

    // Polymorphism in action using modern C++ smart pointers
    vector<unique_ptr<Employee>> company;
    company.push_back(make_unique<Developer>("Fathur Rahman", 1, "C++ & Laravel"));
    company.push_back(make_unique<Manager>("John Doe", 2, 5));

    for (const auto& emp : company) {
        emp->display();
        emp->work();
        cout << "------------------------" << endl;
    }

    return 0;
}
