CXX = g++
CXXFLAGS = -Wall -std=c++17

all: run

build: main.cpp
	$(CXX) $(CXXFLAGS) -o main main.cpp

run: build
	./main

clean:
	rm -f main
