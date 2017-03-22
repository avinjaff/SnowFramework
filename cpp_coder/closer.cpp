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

std::string encrypt(char lines[],int key)
{
    unsigned int i;
    for(i=0;i<strlen(lines);++i)
    {
        lines[i] = lines[i] - key;
    }
    return std::string(lines);
}

std::string decrypt(char lines[],int key)
{
    unsigned int i;
    for(i=0;i<strlen(lines);++i)
    {
        lines[i] = lines[i] + key;
    }
    return std::string(lines);
}
std::string hexConvert(const std::string& input)
{
    static const char* const lut = "0123456789";

    size_t len = input.length();

    std::string output;
    output.reserve(2 * len);
    for (size_t i = 0; i < len; ++i)
    {
        const unsigned char c = input[i];
        output.push_back(lut[c >> 4]);
        output.push_back(lut[c & 15]);
    }
    return output;
}
#define OR ||
int main(int argc, const char* argv[] )
{
    // argv[1] = command (en|de|version)
    // argv[2] = input path
    // argv[3] = output path

    if (argc < 2)
    {
        cout<<"error: no arguments passed.\n";
        return 0;
    }
    std::string command = std::string(argv[1]);
    if (command == "version")
    {
        cout << "1"; // Show software version
    }
    else if (command == "en" || command == "de")
    {
        //Check for arguments
        if (argc < 4)
        {
             cout << "error: not enough arguments.\n";
            return 0;
        }

        // convert password to hexademical
        int password;
        istringstream (hexConvert(std::string("0000"))) >> password; // password here



        // converting... please wait :)
        string STRING;
        ofstream outFile;
        ifstream inFile;
        inFile.open(argv[2],ios_base::binary);
        outFile.open(argv[3]);

        if (command == "en") //encrpt
        {
            while(getline(inFile,STRING)){
                char *cstr = new char[STRING.length() + 1];
                strcpy(cstr, STRING.c_str());
                    outFile <<  encrypt(cstr,password) + "\n";
                delete [] cstr;
                STRING = "";
                outFile.close();
            }
        }
        else if (command == "de") //decrpt
        {
            while(getline(inFile,STRING)){
                char *cstr = new char[STRING.length() + 1];
                strcpy(cstr, STRING.c_str());
                    outFile <<  decrypt(cstr,password) + "\n";
                delete [] cstr;
                STRING = "";
                outFile.close();
            }
        }
        inFile.close();
        outFile.close();
    }
    return 0;
}
