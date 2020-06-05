#ifndef _HTTP_STRUCT_H_
#define _HTTP_STRUCT_H_

#include <string>
#include <sstream>
#include <map>

typedef struct _HttpRequestContext {
        std::string method;
        std::string url;
        std::string version;
        std::map<std::string, std::string> header;
        std::string body;
}HttpRequestContext;

typedef struct _HttpResponseContext {
    std::string version;
    std::string statecode;
    std::string statemsg;
        std::map<std::string, std::string> header;
        std::string body;
}HttpResponseContext;

#endif /* _HTTP_STRUCT_H_*/
