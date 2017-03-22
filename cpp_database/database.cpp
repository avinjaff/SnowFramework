/*
Developer: Mohammad Reza Tayyebi
*/

#include <iomanip>
// #include <regex>
#include <iterator>
#include <string>
#include <sys/types.h>
#include <sys/stat.h>
#include <iostream>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <fstream>
#include <sstream>

using namespace std;

void create(const char* path, const char* content)
{
    ofstream outFile;
    outFile.open(path);
    outFile << content;
}
void read(const char* path)
{
    ifstream inFile;
    inFile.open(path,ios_base::binary);
    string STRING;
        while(getline(inFile,STRING)){
    cout << STRING;
    }
}
void del(const char* path)
{
    string com = "rm -rf ";
    com += path;
    system(com.c_str());
}
void cut(const char* first, const char* last)
{
    string com = "mv ";
    com += first;
    com += " ";
    com += last;
    system(com.c_str());
}
void update(const char* path, const char* content)
{
    ofstream outFile;
    outFile.open(path);
    outFile << content;
}
void makedir(const char* path)
{
    string com = "mkdir ";
    com += path;
    system(com.c_str());
}
void removedir(const char* path)
{
    string com = "rm -rf ";
    com += path;
    system(com.c_str());
}

int main( int argc, const char* argv[])
{
	//Check for arguments
	if (argc < 2)
	{
		cout << "error: no argument.";
		//End process
		return 0;
	}

	//Convert command to string
	std::string command = std::string(argv[1]);

	//regex for command injection security
	for (int n = 1; n < argc; n++)
	{
		// std::string str = "Hello world";
		// boost::regex rx("world");
		// std::string replacement = "planet";
		// std::string str2 = std::regex_replace(str, rx, replacement);
	}

	//Choose command and function
	if (command == "cr")
	{
        create(argv[2],argv[3]);
	}
	else if (command == "rd")
	{
        read(argv[2]);
	}
	else if (command == "dl")
	{
        del(argv[2]);
	}
	else if (command == "mv")
	{
        cut(argv[2],argv[3]);
	}
	else if (command == "up")
	{
        update(argv[2],argv[3]);
	}
	else if (command == "mkdir")
	{
        makedir(argv[2]);
	}
	else if (command == "rmdir")
	{
		removedir(argv[2]);
	}
	else if (command == "--help")
	{
        cout << "\"cr\" to create file\n";
        cout << "\"rd\" to read file\n";
        cout << "\"dl\" to delete file\n";
        cout << "\"mv\" to move file\n";
        cout << "\"up\" to update file\n";
        cout << "\"mkdir\" to create directory\n";
        cout << "\"rmdir\" to remove directory\n";
	}
	return 0;
}
